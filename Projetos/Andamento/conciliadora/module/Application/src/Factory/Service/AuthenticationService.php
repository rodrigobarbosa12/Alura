<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationService implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Zend\Authentication\AuthenticationService(
            new \Zend\Authentication\Storage\NonPersistent(),
            $container->get(\Application\Service\AuthenticationAdapter::class)
        );
    }
}
