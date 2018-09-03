<?php

namespace Comprovante;

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

                Service\Comprovante::class => Factory\Service\Comprovante::class,
                Mapper\Comprovante::class => Factory\Mapper\Comprovante::class,

            ],
        ];
    }
}
