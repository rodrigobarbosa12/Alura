<?php

namespace ComprovanteTest\Controller;

use Application\Service\APIConciliadora;
use Comprovante\Controller\IndexController;
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
                    'getComprovante',
                ])
                ->getMock();

        $this->getApplicationServiceLocator()->setService(APIConciliadora::class, $this->api);
    }

    private function mockSucesso()
    {
        $this->api
            ->expects($this->once())
            ->method('getComprovante')
            ->willReturn('COMPROVANTE');
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->mockSucesso();
        $this->dispatch('http://conciliadora.maxscalla.com.br/comprovante', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Comprovante');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('comprovante');
    }

    public function testIndexActionViewModelTemplateRenderedWithinLayout()
    {
        $this->mockSucesso();
        $this->dispatch('http://conciliadora.maxscalla.com.br/comprovante', 'GET');
        $this->assertQuery('#grid-comprovante');
    }
}
