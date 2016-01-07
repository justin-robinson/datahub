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
