<?php

namespace ProdutosTest;

use Application\Service\TestCase;

class ModuleTest extends TestCase
{

    public function testeGetServiceConfig()
    {
        $module = new \Produtos\Module();
        $this->assertInternalType('array', $module->getServiceConfig());
    }

    public function testeGetConfig()
    {
        $module = new \Produtos\Module();

        $this->assertInternalType('array', $module->getConfig());
    }
}
