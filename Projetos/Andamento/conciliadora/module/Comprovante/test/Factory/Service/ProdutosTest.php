<?php

namespace ProdutosTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ProdutosTest extends TestCase
{

    public function testeCreateService()
    {
        $mockMapperProdutos = $this->getMockBuilder(\Produtos\Mapper\Produtos::class)->disableOriginalConstructor()->getMock();
        $mockProdutosComplementosGrupo = $this->getMockBuilder(\Produtos\Service\ProdutosComplementosGrupos::class)->disableOriginalConstructor()->getMock();

        $serviceManager = new ServiceManager();
        $serviceManager->setService(\Produtos\Mapper\Produtos::class, $mockMapperProdutos);
        $serviceManager->setService(\Produtos\Service\ProdutosComplementosGrupos::class, $mockProdutosComplementosGrupo);

        $factory = new \Produtos\Factory\Service\Produtos();
        $controller = $factory($serviceManager, \Produtos\Service\Produtos::class);

        $this->assertInstanceOf(\Produtos\Service\Produtos::class, $controller);
    }
}
