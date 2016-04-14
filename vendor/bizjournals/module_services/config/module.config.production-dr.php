<?php
return array(
    'bizjmerchant' => array(
        // key, secret
        'api_url'      => 'https://merchant.bizjournals.com/api.php',
        'frontend_url' => 'https://merchant.bizjournals.com',
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
    'refinery' => array(
        'base_url' => 'http://refinery-de.bizjournals.com/Recon/Match',
    ),
);
