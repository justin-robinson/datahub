<?php

$latestApiChildRoutes = [
    'company'  => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/company',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Company',
            ],
        ],
        'child_routes' => [
            'id'               => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                ],
            ],
            'profile'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]/profile',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\v1\Controller\CompanyProfile',
                    ],
                ],
            ],
            'instances'        => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]/instances',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\v1\Controller\CompanyInstances',
                    ],
                ],
            ],
            'profiles'         => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/profiles',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\CompanyProfile',
                    ],
                ],
            ],
            'profiles-deletes' => [
                'type'    => 'Literal',
                'options' => [
                    'defaults' => [
                        'action'     => 'deleteList',
                        'controller' => 'Api\v1\Controller\CompanyProfile',
                    ],
                    'route'    => '/profiles/deletes',
                ],
            ],
            'search'           => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/search',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\CompanySearch',
                    ],
                ],
            ],
            'search-fuzzy'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/search/fuzzy[/:search]',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\CompanySearchFuzzy',
                    ],
                ],
            ],
        ],
    ],
    'instance' => [
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
            'profile'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]/profile',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\v1\Controller\InstanceProfile',
                    ],
                ],
            ],
                       
            'lists'        => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]/lists',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\v1\Controller\Top25List',
                    ],
                ],
            ],
            
            'search-fuzzy'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/search/fuzzy[/:search]',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\InstanceSearchFuzzy',
                    ],
                ],
            ],
        ],
    ],
    'property' => [
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
    'contact'  => [
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
            'search-fuzzy'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/search/fuzzy[/:search]',
                    'defaults' => [
                        'controller' => 'Api\v1\Controller\ContactSearchFuzzy',
                    ],
                ],
            ],
        ],
    ],
    'state'    => [
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
    'sourceType'    => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/sourcetype',
            'defaults' => [
                'controller' => 'Api\v1\Controller\SourceType',
            ],
        ],
        'child_routes' => [
            'sourceType' => [
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
    'market'    => [
        'type'         => 'Literal',
        'options'      => [
            'route'    => '/market',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Market',
            ],
        ],
        'child_routes' => [
            'market' => [
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
    'refinery' => [
        'type'         => 'Literal',
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
    'dataset'  => [
        'type'    => 'Literal',
        'options' => [
            'route'    => '/dataset',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Dataset',
            ],
        ],
        'child_routes' => [
            'id'               => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '[/:id]',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                ],
            ],
            'type'               => [
                'type'    => 'Segment',
                'options' => [
                    // :type will trigger specific formatting
                    'route'       => '/:id/type/[:type]',
                    'constraints' => [
                        'type' => '[a-z]*',
                        'id' => '[0-9]*',
                    ],
                ],
            ],
            'instances'        => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/:id/entry/[:id]',
                    'constraints' => [
                        'id' => '[0-9]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\v1\Controller\DatasetEntries',
                    ],
                ],
            ],
 
            
        ],
    ],
    'list' => [
        'type'    => 'Literal',
        'options' => [
            'route'    => '/list',
            'defaults' => [
                'controller' => 'Api\v1\Controller\Top25List',
            ],
        ],
        'child_routes' => [
            'id'               => [
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
    
];
return [

    'controllers'  => [
        'invokables' => [
            'Api\v1\Controller\Abstract'           => 'Api\v1\Controller\AbstractRestfulController',
            'Api\v1\Controller\Company'            => 'Api\v1\Controller\CompanyController',
            'Api\v1\Controller\CompanyInstances'   => 'Api\v1\Controller\CompanyInstancesController',
            'Api\v1\Controller\CompanyProfile'     => 'Api\v1\Controller\CompanyProfileController',
            'Api\v1\Controller\CompanySearch'      => 'Api\v1\Controller\CompanySearchController',
            'Api\v1\Controller\CompanySearchFuzzy' => 'Api\v1\Controller\CompanySearchFuzzyController',
            'Api\v1\Controller\Contact'            => 'Api\v1\Controller\ContactController',
            'Api\v1\Controller\ContactSearchFuzzy' => 'Api\v1\Controller\ContactSearchFuzzyController',
            'Api\v1\Controller\InstanceSearchFuzzy'=> 'Api\v1\Controller\InstanceSearchFuzzyController',
            'Api\v1\Controller\Instance'           => 'Api\v1\Controller\InstanceController',
            'Api\v1\Controller\InstanceContacts'   => 'Api\v1\Controller\InstanceContactsController',
            'Api\v1\Controller\InstanceProfile'    => 'Api\v1\Controller\InstanceProfileController',
            'Api\v1\Controller\InstanceProperties' => 'Api\v1\Controller\InstancePropertiesController',
            'Api\v1\Controller\Market'             => 'Api\v1\Controller\MarketController',
            'Api\v1\Controller\Property'           => 'Api\v1\Controller\PropertyController',
            'Api\v1\Controller\State'              => 'Api\v1\Controller\StateController',
            'Api\v1\Controller\SourceType'         => 'Api\v1\Controller\SourceTypeController',
            'Api\v1\Controller\Dataset'            => 'Api\v1\Controller\DatasetController',
            'Api\v1\Controller\DatasetEntries'     => 'Api\v1\Controller\DatasetEntriesController',
            'Api\v1\Controller\Top25List'          => 'Api\v1\Controller\Top25ListController',
        ],
    ],
    'router'       => [
        'routes' => [
            'api'   => [
                'type'         => 'Literal',
                'options'      => [
                    'route' => '/api',
                ],
                'child_routes' => $latestApiChildRoutes,
            ],
            'apiV1' => [
                'type'         => 'Literal',
                'options'      => [
                    'route' => '/api/v1',
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
