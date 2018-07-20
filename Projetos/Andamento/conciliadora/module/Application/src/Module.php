<?php

namespace Application;

class Module
{


    const VERSION = '3.0.3-dev';
    const CHAVE_TOKEN_MAXSCALLA = 'token-api';
    const NIVEL_CLIENTE = 'C';
    const NIVEL_ADMIN = 'A';
    const NIVEL_FUNCIONARIO = 'F';
    const NIVEL_MASTER = 'M';
    const NIVEL_SUPORTE = 'S';
    const FAVICON = '/theme/dist/html/default/assets/app/media/img/logos/favicon-alfredfood.png';
    const USER_DEFAULT = '/theme/dist/html/default/assets/app/media/img/users/default.png';
    const ICONE_APP_STORE = '/theme/dist/html/default/assets/app/media/img/icons/app_store.svg';
    const ICONE_PLAY_STORE = '/theme/dist/html/default/assets/app/media/img/icons/play_store.svg';

    // const PATTERN_DECIMAL_UNSIGNED_7_2 = '[0-9]{0,5}\.*,?[0-9]{0,2}';
    // const TITLE_DECIMAL_UNSIGNED_7_2 = 'Deve ser maior que 0 e menor que 99.999,99';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Service\APIConciliadora::class => Factory\Service\APIConciliadora::class,
                \Zend\Http\Client::class => Factory\Service\Client::class,
                AuthenticationService::class => Factory\Service\AuthenticationService::class,
                Service\AuthenticationAdapter::class => Factory\Service\AuthenticationAdapter::class,
            ]
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'aliases' => [
                'manifestPath' => View\Helper\ManifestPath::class,
            ],
            'factories' => [
                View\Helper\ManifestPath::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            ],
        ];
    }
}
