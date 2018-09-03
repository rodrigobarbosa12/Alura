<?php

namespace Resumo;

use Zend\Router\Http\Segment;
use Zend\Mvc\Controller\LazyControllerAbstractFactory;

return [
    'router' => [
        'routes' => [
            'resumo' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/resumo[/:id]',
                    'defaults' => [
                        'authenticate' => true,
                        'controller' => Controller\IndexController::class,
                    ],
                    'contraints' => [
                        'id' => '[0-9]+'
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => LazyControllerAbstractFactory::class
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
