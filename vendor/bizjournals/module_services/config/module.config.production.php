<?php
return array(
    'rabbitmq' => array(
        'host' => 'mq.bizjournals.com',
        'port' => '5672',
        'user' => 'dev',
        'pass' => 'dev',
    ),
    'bizjmerchant' => array(
        // key, secret
        'api_url'      => 'https://merchant.bizjournals.com/api.php',
        'frontend_url' => 'https://merchant.bizjournals.com',
    ),
    'elastica' => array(
        'servers' => array(
            array('host' => 'elasticsearch.bizjournals.com', 'port' => 9200, 'timeout' => 4),
       ),
    ),
    'elasticaupdate' => array(
        'servers' => array(
            array('host' => 'elasticsearch-1.bizjournals.int', 'port' => 9200, 'timeout' => 4),
            array('host' => 'elasticsearch-2.bizjournals.int', 'port' => 9200, 'timeout' => 4)
        ),
    ),
    'admin_authentication' => array(
        'base_url' => 'http://admin.bizjournals.com/authapi',
    ),
    'medialibrary' => array(
        'key'      => 'gizmocms',
        'secret'   => 'nZcD2oWXEC3mS',
        'base_url' => 'https://mediaapi.bizjournals.com/api',
        'options'  => array(
            'sslverifypeer' => false,
        ),
    ),
    // This is the product account tied to the techpartner@bizjournals.com login
    'ooyala' => array(
        'key'                => 'xmeXI683N_24muU9ZQrWrQE-QgXE.jJbZe',
        'secret'             => 'wJCaTTwpohs3nT-u1WXvUGdYE9uVEFL0lLyzGJj-',
        'branding_id'        => 'b8773f2d0c004524a47c066e67d669cd',
        'admin-source-label' => '36cdd7d71c3e4ca79ece5448e71b0301',
        'base_url'           => 'https://api.ooyala.com',
        'cdn_url'            => 'http://cdn.api.ooyala.com',
        'version'            => 'v2',
        'options'            => array(
            'timeout'        => 1,
            'sslverifypeer'  => false,
        ),
    ),
    'solarium' => array(
        'endpoint' => array(
            'solr' => array(
                'host' => 'solr.bizjournals.com',
                'port' => 80,
                'path' => '/solr/bizjournals/',
            )
        )
    ),
    'cache' => array(
        'memcached' => array(
            'adapter' => array(
                'options' => array(
                    'servers' => array(
                        array(
                            'host' => 'memcache-1.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-2.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-3.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-4.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-5.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-6.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-7.bizjournals.int',
                            'port' => 11211,
                        ),
                        array(
                            'host' => 'memcache-8.bizjournals.int',
                            'port' => 11211,
                        ),
                    ),
                ),
            ),
        ),
    ),
);
