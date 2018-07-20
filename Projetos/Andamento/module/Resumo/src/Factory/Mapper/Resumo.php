<?php

namespace Resumo\Factory\Mapper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Resumo implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mapper = new \Resumo\Mapper\Resumo();

        $mapper->setDbAdapter($container->get('adapter'))
            ->setEntityPrototype(new \Resumo\Entity\Resumo())
            ->setHydrator(new \Resumo\Hydrator\Resumo());

        return $mapper;
    }
}
