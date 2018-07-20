<?php

namespace ResumoTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ResumoTest extends TestCase
{

    public function testeCreateService()
    {
        $mockMapperResumo = $this->getMockBuilder(\Resumo\Mapper\Resumo::class)
            ->disableOriginalConstructor()->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            \Resumo\Mapper\Resumo::class,
            $mockMapperResumo
        );

        $factory = new \Resumo\Factory\Service\Resumo();
        $controller = $factory($serviceManager, \Resumo\Service\Resumo::class);

        $this->assertInstanceOf(\Resumo\Service\Resumo::class, $controller);
    }
}
