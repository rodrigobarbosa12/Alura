<?php

namespace ResumoTest\Factory\Mapper;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ResumoTest extends TestCase
{
    public function testeCreateService()
    {
        $adapter = $this->getMockBuilder(\Zend\Db\Adapter\Adapter::class)->disableOriginalConstructor()->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService('adapter', $adapter);

        $factory = new \Resumo\Factory\Mapper\Resumo();
        $mapper = $factory($serviceManager, \Resumo\Mapper\Resumo::class);

        $this->assertInstanceOf(\Resumo\Mapper\Resumo::class, $mapper);
        $this->assertInstanceOf(\Resumo\Entity\Produto::class, $mapper->getEntityPrototype());
        $this->assertInstanceOf(\Resumo\Hydrator\Produto::class, $mapper->getHydrator());
    }
}
