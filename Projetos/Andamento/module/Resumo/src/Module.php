<?php

namespace Resumo;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [

                Service\Resumo::class => Factory\Service\Resumo::class,
                Mapper\Resumo::class => Factory\Mapper\Resumo::class,

            ],
        ];
    }
}
