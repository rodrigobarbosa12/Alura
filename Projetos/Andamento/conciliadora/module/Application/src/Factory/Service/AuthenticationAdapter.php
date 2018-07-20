<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationAdapter implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Application\Service\AuthenticationAdapter(
            $container->get(\Application\Service\APIConciliadora::class)
        );
    }
}
