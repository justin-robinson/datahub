<?php
return array(
    'rabbitmq' => array(
        'host' => 'mq-dev.bizjournals.int',
        'port' => '5672',
        'user' => 'dev',
        'pass' => 'dev',
    ),
    'bizjmerchant' => array(
        // key, secret
        //'api_url'      => 'http://rkunde.tech.bizjournals.com/bizjmerchant/web/api_dev.php',
        //'frontend_url' => 'http://rkunde.tech.bizjournals.com/bizjmerchant/web/frontend_dev.php',
        'api_url'      => 'http://mlong.tech.bizjournals.com/bizjmerchant/web/api_dev.php',
        'frontend_url' => 'http://mlong.tech.bizjournals.com/bizjmerchant/web/frontend_dev.php',
    ),
    'elastica' => array(
        'servers' => array(
            array('host' => 'cms-dev-search-query.bizjournals.int', 'port' => 9200, 'timeout' => 4),
       ),
    ),
    'elasticaupdate' => array(
        'servers' => array(
            array('host' => 'cms-dev-search-query.bizjournals.int', 'port' => 9200, 'timeout' => 4),
        ),
    ),
    'admin_authentication' => array(
        'base_url' => 'http://admin.dev.bizjournals.com/authapi',
    ),
    'medialibrary' => array(
        'key'      => 'cmsdev',
        'secret'   => '2CsI8ErIHzcT4c',
        'base_url' => 'http://mediaapi.dev.bizjournals.com/api',
    ),
    // This is the development account tied to the techpartner+test1@bizjournals.com login
    'ooyala' => array(
        'key'                => '92bHM6ASkQBsBz75lWhN4DZBygJE.QkA8i',
        'secret'             => 'AwXKbtWYkXcogfO9OSPoFoz0un3Hkc-b0KlM3UqC',
        'branding_id'        => '1fc52e4e96444cf58a42c73027b20dca',
        'admin-source-label' => '596a22f666c84ac9b6ed720f7655bcac',
        'base_url'           => 'https://api.ooyala.com',
        'cdn_url'            => 'http://cdn.api.ooyala.com',
        'version'            => 'v2',
        'options'            => array(
            'timeout'        => 1,
            'sslverifypeer'  => false,
        ),
    ),
    // This is the "normal" staging SOLR server used by staging2, testing.tech, etc.
    'solarium' => array(
        'endpoint' => array(
            'solr' => array(
                'host' => 'solr-dev.bizjournals.int',
                'port' => 8080,
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
                            'host' => 'tech.bizjournals.int',
                            'port' => 11212,
                        ),
                    ),
                ),
            ),
        ),
    ),
);
