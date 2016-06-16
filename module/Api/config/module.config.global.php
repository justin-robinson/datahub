<?php
return [

    'controllers'  => [
        'invokables' => [
            'Api\Controller\Abstract'           => 'Api\Controller\AbstractRestfulController',
            'Api\Controller\Company'            => 'Api\Controller\CompanyController',
            'Api\Controller\CompanyInstances'   => 'Api\Controller\CompanyInstancesController',
            'Api\Controller\CompanyProfile'     => 'Api\Controller\CompanyProfileController',
            'Api\Controller\Contact'            => 'Api\Controller\ContactController',
            'Api\Controller\Instance'           => 'Api\Controller\InstanceController',
            'Api\Controller\InstanceContacts'   => 'Api\Controller\InstanceContactsController',
            'Api\Controller\InstanceProperties' => 'Api\Controller\InstancePropertiesController',
            'Api\Controller\Property'           => 'Api\Controller\PropertyController',
            'Api\Controller\PublicCompany'      => 'Api\Controller\PublicCompanyController',
            'Api\Controller\Search'             => 'Api\Controller\SearchController',
        ],
    ],
    'router'       => [
        'routes' => [
            'company'         => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/company',
                    'defaults' => [
                        'controller' => 'Api\Controller\Company',
                    ],
                ],
                'child_routes' => [
                    'company'   => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                    'instances' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '[/:id]/instances',
                            'defaults' => [
                                'controller' => 'Api\Controller\CompanyInstances',
                            ],
                        ],
                    ],
                ],
            ],
            'instance'        => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/instance',
                    'defaults' => [
                        'controller' => 'Api\Controller\Instance',
                    ],
                ],
                'child_routes' => [
                    'instance'   => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                    'properties' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '[/:id]/properties',
                            'defaults' => [
                                'controller' => 'Api\Controller\InstanceProperties',
                            ],
                        ],
                    ],
                    'contacts'   => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '[/:id]/contacts',
                            'defaults' => [
                                'controller' => 'Api\Controller\InstanceContacts',
                            ],
                        ],
                    ],
                ],
            ],
            'property'        => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/property',
                    'defaults' => [
                        'controller' => 'Api\Controller\Property',
                    ],
                ],
                'child_routes' => [
                    'property' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                ],
            ],
            'contact'         => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/contact',
                    'defaults' => [
                        'controller' => 'Api\Controller\Contact',
                    ],
                ],
                'child_routes' => [
                    'contact' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                ],
            ],
            'company-profile' => [
                'type'         => 'Literal',
                'options'      => [
                    'route'    => '/api/company',
                    'defaults' => [
                        'controller' => 'Api\Controller\CompanyProfile',
                    ],
                ],
                'child_routes' => [
                    'rest' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '[/:id]/profile',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],

                        ],
                    ],

                ],
            ],
            'refinery'        => [
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
            'publicCompany'   => [
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
