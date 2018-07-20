<?php

namespace ProdutosTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class ImagensTest extends TestCase
{
    public function testeCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            \Produtos\Mapper\Imagens::class,
            $this->getMockBuilder(\Produtos\Mapper\Imagens::class)
            ->disableOriginalConstructor()
            ->getMock()
        );
        $serviceManager->setService(
            \Produtos\Service\Upload::class,
            $this->getMockBuilder(\Produtos\Service\Upload::class)
            ->disableOriginalConstructor()
            ->getMock()
        );

        $factory = new \Produtos\Factory\Service\Imagens();
        $controller = $factory($serviceManager, \Produtos\Service\Imagens::class);

        $this->assertInstanceOf(\Produtos\Service\Imagens::class, $controller);
    }
}
