<?php

namespace Comprovante\Factory\Mapper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Comprovante implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mapper = new \Comprovante\Mapper\Comprovante();

        $mapper->setDbAdapter($container->get('adapter'))
            ->setEntityPrototype(new \Comprovante\Entity\Comprovante())
            ->setHydrator(new \Comprovante\Hydrator\Comprovante());

        return $mapper;
    }
}
