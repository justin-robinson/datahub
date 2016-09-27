<?php
return array(
    'bizjmerchant' => array(
        // key, secret
        //'api_url'      => 'http://rkunde.tech.bizjournals.com/bizjmerchant/web/api_staging.php',
        //'frontend_url' => 'http://rkunde.tech.bizjournals.com/bizjmerchant/web/frontend_staging.php',
        'api_url'      => 'http://mlong.tech.bizjournals.com/bizjmerchant/web/api_staging.php',
        'frontend_url' => 'http://mlong.tech.bizjournals.com/bizjmerchant/web/frontend_staging.php',
    ),
    'admin_authentication' => array(
        'base_url' => 'http://admin.staging.bizjournals.com/authapi',
    ),
    // No Ooyala staging account ... this is the development account
    // tied to the techpartner+test1@bizjournals.com login
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
    'datahub' => [
        'host' => 'http://datahub.bizj-staging.com'
    ],
);
