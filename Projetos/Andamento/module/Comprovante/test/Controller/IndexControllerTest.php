<?php

namespace ProdutosTest\Controller;

use Application\Entity\Count;
use Application\Controller\Plugin\ResultSetToArray;
use Application\Controller\AbstractHttpControllerTestCase;
use Exception;
use Produtos\Controller\IndexController;
use Produtos\Exception\RuntimeException;
use Produtos\Entity\Produto;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;
use Zend\Hydrator\ClassMethods;
use Zend\Db\ResultSet\HydratingResultSet;

class IndexControllerTest extends AbstractHttpControllerTestCase
{

    /**
     * @var \Produtos\Service\Produtos
     */
    private $service;

    public function setUp()
    {
        $this->setApplicationConfig(include __DIR__ . '/../../../../config/application.config.php');

        $this->service = $this->getMockBuilder(\Produtos\Service\Produtos::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'contar',
                'deletar',
                'atualizar',
                'cadastrar',
                'selecionar',
                'selecionarPorId',
            ])
            ->getMock();

        parent::setUp();
        $this->getApplicationServiceLocator()->setService(\Produtos\Service\Produtos::class, $this->service);
    }

    public function testGet()
    {
        $resultadoService = new Produto(['id' => 1]);
        $this->service->expects($this->once())->method('selecionarPorId')->willReturn($resultadoService);

        $this->dispatch('/produtos/1', 'GET', ['colunas']);
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('produtos');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('produtos');
        $this->assertEquals(Json::encode($resultadoService->toArray()), $this->getResponse()->getBody());
    }

    public function testGetInvalido()
    {
        $this->service->expects($this->once())
                ->method('selecionarPorId')
                ->will($this->throwException(new Exception("Produto #1 não existe", 404)));

        $this->dispatch('/produtos/1', 'GET', ['colunas']);
        $this->assertResponseStatusCode(404);
        $this->assertModuleName('produtos');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('produtos');
    }

    public function testGetList()
    {
        $resultSetToArray = new ResultSetToArray();

        $resultSet = new HydratingResultSet(new ClassMethods(), new Produto());
        $resultSet->initialize([['id' => 1], ['id' => 1]]);

        $this->service->expects($this->once())->method('selecionar')->willReturn($resultSet);

        $resultadoContar = new Count([
            'pagina' => 1,
            'totalRegistros' => 2,
            'quantidadePaginas' => 20,
        ]);

        $this->service->expects($this->once())->method('contar')->willReturn($resultadoContar);

        $retorno = new JsonModel([
            'data' => $resultSetToArray($resultSet),
            'count' => $resultadoContar->toArray(),
        ]);

        $this->dispatch('/produtos', 'GET', ['colunas' => ['id', 'nome']]);
        $this->assertResponseStatusCode(200);
        $this->assertEquals(Json::encode($retorno->getVariables()), $this->getResponse()->getBody());
    }

    public function testGetListInvalido()
    {
        $this->service->expects($this->once())
                ->method('selecionar')
                ->will($this->throwException(new RuntimeException('', 404)));

        $this->dispatch('/produtos', 'GET', ['colunas' => ['id', 'nome']]);
        $this->assertResponseStatusCode(404);

        $resultado = Json::decode($this->getResponse()->getBody());
        $this->assertEquals('', $resultado->message);
    }

    public function testCreate()
    {
        $this->service->expects($this->once())->method('cadastrar')->willReturn(1);

        $retorno = new JsonModel([
            'id' => 1,
        ]);

        $this->dispatch('/produtos/1', 'POST', [
            'id' => 1,
            'valor' => 5.27,
            'nome' => 'Coca Cola'
        ]);
        $this->assertResponseStatusCode(200);
        $this->assertEquals(Json::encode($retorno->getVariables()), $this->getResponse()->getBody());
    }

    public function testCreateInvalidoEntity()
    {
        $this->service->expects($this->once())
        ->method('cadastrar')
        ->will($this->throwException(new Exception('', 422)));

        $this->dispatch('/produtos', 'POST');
        $this->assertResponseStatusCode(422);

        $resultado = Json::decode($this->getResponse()->getBody());
        $this->assertEquals('', $resultado->message);
    }

    public function testUpdate()
    {
        $this->service->expects($this->once())->method('atualizar')->willReturn(1);

        $this->dispatch('/produtos/1', 'PUT', [
            'valor' => 6.35
        ]);

        $retorno = new JsonModel([
            'id' => 1
        ]);

        $this->assertResponseStatusCode(200);

        $this->assertEquals(Json::encode($retorno->getVariables()), $this->getResponse()->getBody());
    }

    public function testeUpdateInvalidoEntity()
    {
        $this->service->expects($this->once())
                ->method('atualizar')
                ->will($this->throwException(new Exception('Nao foi possivel inserir registro', 422)));

        $this->dispatch('/produtos/1', 'PUT', [
            'valorrr' => 7.35,
        ]);
        $this->assertResponseStatusCode(422);

        $resultado = Json::decode($this->getResponse()->getBody());
        $this->assertEquals('Nao foi possivel inserir registro', $resultado->message);
    }

    public function testDelete()
    {
        $this->service->expects($this->once())->method('deletar')->willReturn(1);

        $retorno = new JsonModel([
            'id' => 1,
        ]);

        $this->dispatch('/produtos/2', 'DELETE');
        $this->assertResponseStatusCode(200);
        $this->assertEquals(Json::encode($retorno->getVariables()), $this->getResponse()->getBody());
    }

    public function testeDeleteInvalidoEntity()
    {
        $this->service->expects($this->once())
                ->method('deletar')
                ->will($this->throwException(new Exception('Faltou parametro', 422)));

        $this->dispatch('/produtos/2', 'DELETE');
        $this->assertResponseStatusCode(422);

        $resultado = Json::decode($this->getResponse()->getBody());
        $this->assertEquals('Faltou parametro', $resultado->message);
    }
}
