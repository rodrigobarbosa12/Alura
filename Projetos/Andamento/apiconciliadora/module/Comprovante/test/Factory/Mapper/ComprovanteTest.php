<?php

namespace ComprovanteTest\Factory\Mapper;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ComprovanteTest extends TestCase
{
    public function testeCreateService()
    {
        $adapter = $this->getMockBuilder(\Zend\Db\Adapter\Adapter::class)->disableOriginalConstructor()->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService('adapter', $adapter);

        $factory = new \Comprovante\Factory\Mapper\Comprovante();
        $mapper = $factory($serviceManager, \Comprovante\Mapper\Comprovante::class);

        $this->assertInstanceOf(\Comprovante\Mapper\Comprovante::class, $mapper);
        $this->assertInstanceOf(\Comprovante\Entity\Produto::class, $mapper->getEntityPrototype());
        $this->assertInstanceOf(\Comprovante\Hydrator\Produto::class, $mapper->getHydrator());
    }
}
