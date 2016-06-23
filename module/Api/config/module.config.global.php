<?php

$latestApiChildRoutes = [
    'company'         => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/company',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Company',
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
                        'controller' => 'Api\v1\Controller\CompanyInstances',
                    ],
                ],
            ],
        ],
    ],
    'instance'        => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/instance',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Instance',
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
                        'controller' => 'Api\v1\Controller\InstanceProperties',
                    ],
                ],
            ],
            'contacts'   => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '[/:id]/contacts',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\InstanceContacts',
                    ],
                ],
            ],
        ],
    ],
    'property'        => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/property',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Property',
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
            'route'    => '/contact',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Contact',
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
    'state'         => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/state',
            'defaults' => [
                'controller' => 'Api\v1\Controller\State',
            ],
        ],
        'child_routes' => [
            'state' => [
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
    'company-profile-deletes' => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/company/profile/deletes',
            'defaults' => [
                'controller' => 'Api\v1\Controller\CompanyProfile',
                'action'     => 'deleteList',
            ],
        ],
    ],
    'company-profile' => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/company',
            'defaults' => [
                'controller' => 'Api\v1\Controller\CompanyProfile',
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
            'route'    => '/refinery',
            'defaults' => [
                'controller' => 'Api\v1\Controller\CompanyProfile',
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
            'route'    => '/public/company',
            'defaults' => [
                'controller' => 'Api\v1\Controller\PublicCompany',
                'action'     => 'index',
            ],
        ],
    ],
];
return [

    'controllers'  => [
        'invokables' => [
            'Api\v1\Controller\Abstract'           => 'Api\v1\Controller\AbstractRestfulController',
            'Api\v1\Controller\Company'            => 'Api\v1\Controller\CompanyController',
            'Api\v1\Controller\CompanyInstances'   => 'Api\v1\Controller\CompanyInstancesController',
            'Api\v1\Controller\CompanyProfile'     => 'Api\v1\Controller\CompanyProfileController',
            'Api\v1\Controller\Contact'            => 'Api\v1\Controller\ContactController',
            'Api\v1\Controller\Instance'           => 'Api\v1\Controller\InstanceController',
            'Api\v1\Controller\InstanceContacts'   => 'Api\v1\Controller\InstanceContactsController',
            'Api\v1\Controller\InstanceProperties' => 'Api\v1\Controller\InstancePropertiesController',
            'Api\v1\Controller\Property'           => 'Api\v1\Controller\PropertyController',
            'Api\v1\Controller\PublicCompany'      => 'Api\v1\Controller\PublicCompanyController',
            'Api\v1\Controller\Search'             => 'Api\v1\Controller\SearchController',
            'Api\v1\Controller\State'              => 'Api\v1\Controller\StateController',
        ],
    ],
    'router'       => [
        'routes' => [
            'api' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/api'
                ],
                'child_routes' => $latestApiChildRoutes,
            ],
            'apiV1' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/api/v1'
                ],
                'child_routes' => $latestApiChildRoutes,
            ],
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
