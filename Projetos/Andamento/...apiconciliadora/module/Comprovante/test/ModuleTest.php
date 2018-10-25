<?php

namespace ComprovanteTest;

use Application\Service\TestCase;

class ModuleTest extends TestCase
{

    public function testeGetServiceConfig()
    {
        $module = new \Comprovante\Module();
        $this->assertInternalType('array', $module->getServiceConfig());
    }

    public function testeGetConfig()
    {
        $module = new \Comprovante\Module();

        $this->assertInternalType('array', $module->getConfig());
    }
}
