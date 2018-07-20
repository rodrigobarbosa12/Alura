<?php

namespace ApplicationTest\Factory\Service;

use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;

class ClientTest extends TestCase
{
    private $request;
    private $serviceManager;

    public function setUp()
    {
        $this->request = $this->getMockBuilder(\Zend\Http\Request::class)
            ->setMethods(['getCookie'])
            ->getMock();

        $this->serviceManager = new ServiceManager();
        $this->serviceManager->setService('Request', $this->request);
    }

    public function testInvokeSemCookie()
    {
        $factory = new \Application\Factory\Service\Client();
        $client = $factory($this->serviceManager, (\Zend\Http\Client::class));

        $this->assertInstanceOf(\Zend\Http\Client::class, $client);
        $real = $client->getUri()->getHost();
        $esperado = 'apiconciliadora.maxscalla.com.br';
        $this->assertEquals($esperado, $real);
    }

    // public function testInvokeComCookie()
    // {
    //     $this->request
    //         ->expects($this->once())
    //         ->method('getCookie')
    //         ->willReturn([\Application\Module::CHAVE_TOKEN_MAXSCALLA => 'TOKEN_MAXSCALLA']);

    //     $factory = new \Application\Factory\Service\Client();
    //     $client = $factory($this->serviceManager, (\Zend\Http\Client::class));

    //     $this->assertInstanceOf(\Zend\Http\Client::class, $client);
    //     $esperado1 = 'apiconciliadora.maxscalla.com.br';
    //     $real1 = $client->getUri()->getHost();
    //     $this->assertEquals($esperado1, $real1);

    //     $esperado2 = 'TOKEN_MAXSCALLA';
    //     $real2 = $client->getHeader('Authorization');
    //     $this->assertEquals($esperado2, $real2);
    // }
}
