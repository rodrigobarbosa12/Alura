<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

class Module
{
    const VERSION = '3.0.3-dev';
    const URL = 'http://apiconciliadora.maxscalla.com.br';
    const NO_REPLY = 'no-reply@maxscalla.com.br';
    const SENHA_JWT = 'amdsdl7586';
    const ERR_ADICIONAR_PRODUTOS_INATIVOS = 1000;

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Mapper\Count::class => Factory\Mapper\Count::class,
                Service\Count::class => Factory\Service\Count::class,
                Service\Autenticacao::class => Factory\Service\Autenticacao::class,
                Service\JsonWebToken::class => Factory\Service\JsonWebToken::class
            ],
        ];
    }
}
