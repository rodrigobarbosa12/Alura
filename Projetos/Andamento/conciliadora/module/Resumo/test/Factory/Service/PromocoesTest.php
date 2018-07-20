<?php

namespace ProdutosTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class PromocoesTest extends TestCase
{
    public function testeCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            \Produtos\Mapper\Promocoes::class,
            $this->getMockBuilder(\Produtos\Mapper\Promocoes::class)
            ->disableOriginalConstructor()
            ->getMock()
        );


        $factory = new \Produtos\Factory\Service\Promocoes();
        $controller = $factory($serviceManager, \Produtos\Service\Promocoes::class);

        $this->assertInstanceOf(\Produtos\Service\Promocoes::class, $controller);
    }
}
