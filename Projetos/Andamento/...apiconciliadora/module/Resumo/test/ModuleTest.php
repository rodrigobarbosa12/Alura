<?php

namespace ResumoTest;

use Application\Service\TestCase;

class ModuleTest extends TestCase
{

    public function testeGetServiceConfig()
    {
        $module = new \Resumo\Module();
        $this->assertInternalType('array', $module->getServiceConfig());
    }

    public function testeGetConfig()
    {
        $module = new \Resumo\Module();

        $this->assertInternalType('array', $module->getConfig());
    }
}
