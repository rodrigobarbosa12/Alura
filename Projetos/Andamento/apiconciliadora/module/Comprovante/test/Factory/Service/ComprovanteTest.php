<?php

namespace ComprovanteTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ComprovanteTest extends TestCase
{

    public function testeCreateService()
    {
        $mockMapperComprovante = $this->getMockBuilder(\Comprovante\Mapper\Comprovante::class)
            ->disableOriginalConstructor()->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            \Comprovante\Mapper\Comprovante::class,
            $mockMapperComprovante
        );

        $factory = new \Comprovante\Factory\Service\Comprovante();
        $controller = $factory($serviceManager, \Comprovante\Service\Comprovante::class);

        $this->assertInstanceOf(\Comprovante\Service\Comprovante::class, $controller);
    }
}
