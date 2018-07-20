<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\Http\Client;
use Zend\ServiceManager\Factory\FactoryInterface;

class APIConciliadora implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new $requestedName(
            $container->get(Client::class),
            $container->get('Request')
        );
    }
}
