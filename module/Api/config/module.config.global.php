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
//            'api' => [
//                'type'          => 'Literal',
//                'options'       => [
//                    'route'    => '/api',
//                    'defaults' => [
//                        'controller' => 'Api\Controller\Search',
//                        'action'     => 'index',
//                    ],
//                ],
//                'may_terminate' => false,
//                'child_routes'  => [
//
//                ],
//            ],

            'company' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/company[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => 'Api\Controller\Company',
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
