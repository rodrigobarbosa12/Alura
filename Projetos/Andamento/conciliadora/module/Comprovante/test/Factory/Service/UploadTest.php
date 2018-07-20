<?php

namespace ProdutosTest\Factory\Service;

use Application\Service\TestCase;
use Zend\ServiceManager\ServiceManager;

class UploadTest extends TestCase
{
    public function testeCreateService()
    {
        $serviceManager = new ServiceManager();

        $factory = new \Produtos\Factory\Service\Upload();
        $controller = $factory($serviceManager, \Produtos\Service\Upload::class);

        $this->assertInstanceOf(\Produtos\Service\Upload::class, $controller);
    }
}
