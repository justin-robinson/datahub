<?php
return array(
    'bizjmerchant' => array(
        'options'  => array(
            'sslverifypeer' => false,
        ),
    ),
    'circapi' => array(
        'base_url' => 'https://subscribe.bizjournals.com/servlet/',
        'options'  => array(
            'sslverifypeer' => false,
        ),
    ),
    'datahub' => [
        'host' => 'http://datahub.bizj-production.com'
    ],
    'elastica' => array(
        'log' => false,
    ),
    'admin_authentication' => array(
        'secrets' => array(
            'ni' => 'bAc3f8dD2oWXEC3dfb8e',
        ),
    ),
    'multipub' => array(
        'base_url' => 'https://subscribe.bizjournals.com/servlet/lookup',
        'options'  => array(
            'sslverifypeer' => false,
        ),
    ),
    'nstein' => array(
        'industry_map' => array(
            'full' => array(
                'Economic View: Bankruptcies'                         => 66, // Banking & Financial Services
                'Economic View: Economic Snapshot'                    => 66, // Banking & Financial Services
                'Real Estate: Residential'                            => 82, // Residential Real Estate
                'Real Estate: REITS & Finance'                        => 82, // Residential Real Estate
                'Real Estate: Construction'                           => 82, // Residential Real Estate
                'Real Estate: Commercial'                             => 71, // Commercial Real Estate
                'Banking & Financial Services: Insurance'             => 69, // Insurance
                'Business Services: Legal Services'                   => 79, // Legal Services
                'Business Services: Marketing'                        => 67, // Media & Marketing
                'Business Services: Human Resources'                  => 78, // Human Resources
                'Business Services: Employee Compensation & Benefits' => 78, // Human Resources
                'Business Services: Workplace Regulations'            => 78, // Human Resources
                'Business Services: Environmental Services'           => 76, // Environment
            ),
            'partial' => array(
                'Retailing & Restaurants'      => 72, // Retailing & Restaurants
                'Sports Business'              => 59, // Sports Business
                'Travel'                       => 73, // Travel
                'Health Care'                  => 68, // Health Care
                'Manufacturing'                => 49, // Manufacturing
                'Banking & Financial Services' => 66, // Banking & Financial Services
                'Energy'                       => 83, // Energy
                'High Tech'                    => 70, // Technology
            )
        ),
    ),
    'omniture' => array(
        'tracking_server'        => 'metric.bizjournals.com',
        'tracking_server_secure' => 'metrics.bizjournals.com',
        'visitor_namespace'      => 'bizjournals',
        'mcorg_id'               => '653F60B351E568560A490D4D@AdobeOrg',
        'servers'                => array(),
    ),
    'refinery' => array(
        'base_url' => 'http://refinery.bizjournals.com/Recon/Match',
    ),
    'router' => array(
        'routes' => array(
            'services' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/services',
                    'defaults' => array(
                        'controller' => 'Services\Controller\Index',
                        'action'     => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'nstein' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/nstein[/:action][/]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Services\Controller\Nstein',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'refinery' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/refinery[/:action][/]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Services\Controller\Refinery',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'cache' => array(
        'memcached' => array(
            'adapter' => array(
                'name' => 'memcached',
                'options' => array(
                    'namespace' => __NAMESPACE__,
                    'ttl' => 180,
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Services\Controller\Index'    => 'Services\Controller\IndexController',
            'Services\Controller\Nstein'   => 'Services\Controller\NsteinController',
            'Services\Controller\Refinery' => 'Services\Controller\RefineryController',
        ),
    ),
);
