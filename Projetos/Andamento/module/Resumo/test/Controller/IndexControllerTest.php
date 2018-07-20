<?php

namespace ResumoTest\Controller;

use Application\Service\APIConciliadora;
use Resumo\Controller\IndexController;
use Zend\Http\Response;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(include __DIR__ . '/../../../../config/application.config.php');
        parent::setUp();

        $this->api = $this->getMockBuilder(APIConciliadora::class)
                ->disableOriginalConstructor()
                ->setMethods([
                    'getResumo',
                ])
                ->getMock();

        $this->getApplicationServiceLocator()->setService(APIConciliadora::class, $this->api);
    }

    private function mockSucesso()
    {
        $this->api
            ->expects($this->once())
            ->method('getResumo')
            ->willReturn('RESUMO');
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->mockSucesso();
        $this->dispatch('http://conciliadora.maxscalla.com.br/resumo', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Resumo');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('resumo');
    }

    public function testIndexActionViewModelTemplateRenderedWithinLayout()
    {
        $this->mockSucesso();
        $this->dispatch('http://conciliadora.maxscalla.com.br/resumo', 'GET');
        $this->assertQuery('#grid-resumo');
    }
}
