<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Client implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Zend\Http\Client($this->getApiUrl($container));
    }

    private function getApiUrl(ContainerInterface $container)
    {
        return 'http://apiconciliadora.maxscalla.com.br';
    }
}
