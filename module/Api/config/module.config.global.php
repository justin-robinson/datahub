<?php
return [

    'controllers'  => [
        'invokables' => [
            'Api\Controller\Abstract'       => 'Api\Controller\AbstractRestfulController',
            'Api\Controller\Search'         => 'Api\Controller\SearchController',
            'Api\Controller\Company' => 'Api\Controller\CompanyController',
            'Api\Controller\CompanyProfile' => 'Api\Controller\CompanyProfileController',
            'Api\Controller\PublicCompany'  => 'Api\Controller\PublicCompanyController',
        ],
    ],
    'router'       => [
        'routes' => [
            'company' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/api/company',
                    'defaults' => [
                        'controller' => 'Api\Controller\Company',
                    ],
                ],
                'child_routes' => [
                    'rest' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ]
                        ]
                    ]
                ]
            ],
            'company-profile'       => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/company/profile',
                    'defaults' => [
                        'controller' => 'Api\Controller\CompanyProfile',
                    ],
                ],
                'child_routes' => [
                    'rest' => [
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
            'refinery'      => [
                'type'         => 'Segment',
                'options'      => [
                    'route'    => '/api/refinery',
                    'defaults' => [
                        'controller' => 'Api\Controller\CompanyProfile',
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
            'publicCompany' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/api/public/company',
                    'defaults' => [
                        'controller' => 'Api\Controller\PublicCompany',
                        'action'     => 'index',
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
