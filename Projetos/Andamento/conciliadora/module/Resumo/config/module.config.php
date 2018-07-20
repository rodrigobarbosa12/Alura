<?php

namespace Resumo;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Mvc\Controller\LazyControllerAbstractFactory;

return [
    'router' => [
        'routes' => [
            'resumo' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/resumo',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'authenticate' => true,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => LazyControllerAbstractFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
