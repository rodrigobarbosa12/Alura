<?php

namespace ApplicationTest\Service;

use Application\Service\APIConciliadora;
use PHPUnit\Framework\TestCase;
use Zend\Stdlib\Parameters;
use Zend\Http\Request;
use Zend\Http\Response;

class APIConciliadoraTest extends TestCase
{
    /**
     * @var \Zend\Http\Client
     */
    private $client;

    /**
     * @var \Zend\Http\Request
     */
    private $request;

    /**
     * @var \Application\Service\APIConciliadora
     */
    private $api;

    public function setUp()
    {
        $this->client = $this->getMockBuilder(\Zend\Http\Client::class)
            ->setMethods([
                'send',
                'setParameterGet',
                'getUri',
                'setPath',
            ])
            ->getMock();

        $this->request = $this->getMockBuilder(\Zend\Http\Request::class)
            ->setMethods([
                'getQuery',
            ])
            ->getMock();

        $this->client->expects($this->any())->method('getUri')->willReturn($this->client);

        $this->api = $this->getMockBuilder(\Application\Service\APIConciliadora::class)
            ->setConstructorArgs([$this->client, $this->request])
            ->setMethods(null)
            ->getMock();
    }

    public function testRedirecinandoSeDeslogado()
    {
        $parameters = [];

        $this->request
            ->expects($this->any())
            ->method('getQuery')
            ->willReturn(new Parameters($parameters));

        $this->request->setUri('http://conciliadora.maxscalla.com.br/resumo');

        $response = new Response();
        $response->setStatusCode(Response::STATUS_CODE_401);

        $redirectResponse = new Response();
        $redirectResponse->getHeaders()->addHeaderLine(
            'Location',
            '/login?url-solicitada=http%3A%2F%2Fconciliadora.maxscalla.com.br%2Fresumo'
        );

        $redirectResponse->setStatusCode(302);

        $this->client
            ->expects($this->once())
            ->method('setParameterGet')
            ->with($parameters);

        $this->client
            ->expects($this->once())
            ->method('send')
            ->willReturn($response);

        $this->client
            ->expects($this->once())
            ->method('setPath')
            ->with('/resumo');

        $retorno = $this->api->getResumo();
        $this->assertEquals($retorno, $redirectResponse);
    }

}
