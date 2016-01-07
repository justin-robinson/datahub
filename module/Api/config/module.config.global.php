<?php
return [
    'router' => [
        'routes' => [
            'api' => [
                'type'          => 'Literal',
                'options'       => [
                    'route'    => '/api',
                    'defaults' => [
                        'controller' => 'Api\Controller\Search',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => false,
                'child_routes'  => [
                    'company' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '/company[/:id]',
                            'constraints' => [
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults'    => [
                                'controller' => 'Api\Controller\Company',
//                                'action'     => 'get',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'invokables' => [
            'Api\Controller\Abstract' => 'Api\Controller\AbstractRestfulController',
            'Api\Controller\Search'   => 'Api\Controller\SearchController',
            'Api\Controller\Company'  => 'Api\Controller\CompanyController',
        ],
    ],

    'view_manager' => [
//        'template_path_stack' => [
//            'api' => __DIR__ . '/../view',
//        ],
        'strategies'          => [
            'ViewJsonStrategy',
        ],
    ],
];
