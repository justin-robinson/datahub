<?php
return [

    'controllers' => [
        'invokables' => [
            'Api\Controller\Abstract' => 'Api\Controller\AbstractRestfulController',
            'Api\Controller\Search'   => 'Api\Controller\SearchController',
            'Api\Controller\Company'  => 'Api\Controller\CompanyController',
        ],
    ],

    'router' => [
        'routes' => [
            'company'  => [
                'type'         => 'Segment',
                'options'      => [
                    'route'    => '/api/company',
                    'defaults' => [
                        'controller' => 'Api\Controller\Company',
                    ],
                ],
                'child_routes' => [
                    'hub' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                        ],
                    ],

                ],
            ],
            'refinery' => [
                'type'         => 'Segment',
                'options'      => [
                    'route'    => '/api/refinery',
                    'defaults' => [
                        'controller' => 'Api\Controller\Company',
                    ],
                ],
                'child_routes' => [
                    'refinery' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '\d*',
                            ],
                            'defaults'    => [
                                'action' => 'refinery',
                            ],
                        ],
                    ],
                ],
            ],
        ],

    ],

    'view_manager' => [

        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
