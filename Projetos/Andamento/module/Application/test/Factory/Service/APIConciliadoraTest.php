<?php

namespace ApplicationTest\Factory\Service;

use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use Zend\Http\Client;

class APIConciliadoraTest extends TestCase
{
    public function testInvoke()
    {
        $serviceManager = new ServiceManager();

        $serviceManager->setService(
            Client::class,
            new Client()
        );

        $serviceManager->setService(
            'Request',
            new \Zend\Http\Request()
        );

        $factory = new \Application\Factory\Service\APIConciliadora();
        $service = $factory($serviceManager, (\Application\Service\APIConciliadora::class));
        $this->assertInstanceOf(\Application\Service\APIConciliadora::class, $service);
    }
}
