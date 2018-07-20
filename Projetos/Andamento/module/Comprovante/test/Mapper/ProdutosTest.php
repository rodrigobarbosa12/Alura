<?php

namespace ProdutosTest\Mapper;

use Application\Entity\Filtros;
use Application\Service\TestCase;
use Produtos\Entity\Produto;
use Produtos\Entity\Pesquisa;
use Produtos\Hydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql;
use Zend\Db\Adapter\Adapter;

class ProdutosTest extends TestCase
{

    /**
     * @var \Produtos\Mapper\Produtos
     */
    private $mapper;

    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder(\Produtos\Mapper\Produtos::class)
                ->setMethods(['select', 'insert', 'update'])
                ->getMock();

        $this->mapper->setDbAdapter(new Adapter(['driver' => 'Pdo', 'dsn' => 'sqlite:./test.sql']));
        $this->mapper->setHydrator(new Hydrator\Produto());
        $this->mapper->setEntityPrototype(new Produto());
    }

    public function getSelect()
    {
        $select = new Sql\Select('produtos');
        return $select
            ->join(
                'produtos_imagens',
                'produtos.id = produtos_imagens.produtos_id',
                Hydrator\Imagem::MAP,
                Sql\Select::JOIN_LEFT
            )
            ->join(
                'produtos_promocoes',
                'produtos.id = produtos_promocoes.produtos_id',
                Hydrator\Promocao::MAP,
                Sql\Select::JOIN_LEFT
            )
            ->join(
                'categorias',
                'produtos.categorias_id = categorias.id',
                Hydrator\Categoria::MAP,
                Sql\Select::JOIN_LEFT
            )
            ->join(
                'impressoras',
                'produtos.impressoras_id = impressoras.id',
                Hydrator\Impressora::MAP,
                Sql\Select::JOIN_LEFT
            );
    }

    public function testeSelecionarGridDeProdutos()
    {
        $select = $this->getSelect()->order('produtos.id desc')->limit(10)->offset(0);

        $this->mapper->expects($this->once())->method('select')->with($select);

        $this->mapper->selecionar(new Pesquisa([]));
    }

    public function testeContarRegistros()
    {
        $result = new HydratingResultSet(new Hydrator\Produto(), new Produto());
        $result->initialize(new \ArrayObject());

        $select = $this->getSelect();
        $select->columns(['produtos.id' => new Sql\Expression('1')]);

        $this->mapper
                ->expects($this->once())
                ->method('select')->with($select)->willReturn($result);

        $this->mapper->contar(new Pesquisa());
    }

    public function testeSelecionandoProdutoPorId()
    {
        $select = $this->getSelect()->limit(1);
        $select->where->equalTo('produtos.id', 1)->and->equalTo('produtos.empresas_id', 1);

        $this->mapper->expects($this->once())->method('select')->with($select);

        $this->mapper->selecionarPorId(new Produto(['id' => 1, 'empresasId' => 1]));
    }

    public function testSelecionandoCardapio()
    {
        $where = new \Application\Mapper\Where();
        $where->equalTo('produtos.empresas_id', 1);
        $where->likeAllPossibilities(new Sql\Expression("UPPER(produtos.nome)"), 'HOT');
        $where->likeAllPossibilities(new Sql\Expression("UPPER(produtos.descricao)"), 'HOT');
        $where->equalTo('produtos.id', 1);
        $where->equalTo('produtos.ativo', 1);

        $select = $this->getSelect();
        $select->limit(10);
        $select->offset(0);
        $select->order('produtos.id desc');
        $select->where($where);

        $this->mapper->expects($this->once())->method('select')->with($select);

        $produto = new Produto([
            'empresasId' => 1,
            'id' => 1,
            'nome' => 'HOT',
            'descricao' => 'HOT'
        ]);

        $this->mapper->selecionarCardapio($produto, new Filtros());
    }

    public function testeInserindoRegistros()
    {
        $this->mapper
                ->expects($this->once())
                ->method('insert')
                ->with(new Produto());

        $this->mapper->inserir(new Produto());
    }

    public function testeAtualizandoRegistro()
    {
        $param = new Produto();
        $param->setId(2);
        $param->setDescricao('Teste');

        $this->mapper
            ->expects($this->once())
            ->method('update')
            ->with($param, ['produtos.id' => 2]);

        $this->mapper->editar($param);
    }

    public function testeDeletandoRegistro()
    {
        $this->mapper
                ->expects($this->once())
                ->method('update')
                ->with(['ativo' => 0], ['produtos.id' => 2]);

        $this->mapper->desativarProduto(new Produto(['id' => 2]));
    }
}
