<?php
return [

    'controllers' => [
        'invokables' => [
            'Api\Controller\Abstract'        => 'Api\Controller\AbstractRestfulController',
            'Api\Controller\Search'          => 'Api\Controller\SearchController',
            'Api\Controller\CompanyProfile'  => 'Api\Controller\CompanyProfileController',
        ],
    ],

    'router' => [
        'routes' => [
            'company' => [
                'type'         => 'Segment',
                'options'      => [
                    'route'       => '/api/company/profile',
                    'defaults'    => [
                        'controller' => 'Api\Controller\CompanyProfile',
                    ],
                ],
                'child_routes' => [
                    'hub' => [
                        'type' => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                        ]
                    ],
                    'refinery' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '/refinery[/:id]',
                            'constraints' => [
                                'id' => '\d*'
                            ],
                            'defaults'    => [
                                'action'     => 'refineryId'
                            ]
                        ]
                    ]
                ]
            ],
        ],
    ],

    'view_manager' => [

        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],


];
