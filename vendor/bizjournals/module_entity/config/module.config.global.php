<?php
return array(
    'doctrine' => array(
        'cache' => array(
            'memcached' => array(
                'instance' => 'memcached',
            ),
            'redis' => array(
                'instance' => 'redis',
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'admin' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'admin',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'authentication' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'authentication',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'bizj' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'bizj',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'bizjstatus' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'bizjstatus',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'bzjpreview' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'bzjpreview',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'cms' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'cms',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'datahub' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'cms',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'email' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'email',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Email',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'medialibrary' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'medialibrary',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'nascarillustrated' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'nascarillustrated',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
            'tracking' => array(
                'metadata_cache'   => 'array',
                'query_cache'      => 'array',
                'result_cache'     => 'array',
                'driver'           => 'tracking',
                'generate_proxies' => false,
                'proxy_dir'        => __DIR__ . '/../src/Entity/Proxy',
                'proxy_namespace'  => 'Entity\Proxy',
            ),
        ),
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    'Entity\\Admin\\'               => 'admin',
                    'Entity\\Authentication\\'      => 'authentication',
                    'Entity\\Bizj\\'                => 'bizj',
                    'Entity\\Bizjstatus\\'          => 'bizjstatus',
                    'Entity\\Bzjpreview\\'          => 'bzjpreview',
                    'Entity\\Cms\\'                 => 'cms',
                    'Entity\\Datahub\\'             => 'datahub',
                    'Entity\\Email\\'               => 'email',
                    'Entity\\Medialibrary\\'        => 'medialibrary',
                    'Entity\\NascarIllustrated\\'   => 'nascarillustrated',
                    'Entity\\Tracking\\'            => 'tracking',
                )
            ),
            'admin' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Admin'
                )
            ),
            'authentication' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Authentication'
                )
            ),
            'bizj' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Bizj'
                )
            ),
            'bizjstatus' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Bizjstatus'
                )
            ),
            'bzjpreview' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Bzjpreview'
                )
            ),
            'cms' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Cms'
                )
            ),
            'datahub' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Datahub'
                )
            ),
            'email' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Email'
                )
            ),
            'medialibrary' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Medialibrary'
                )
            ),
            'nascarillustrated' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/NascarIllustrated'
                )
            ),
            'tracking' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'paths' => array(
                    __DIR__ . '/../src/Entity/Yaml/Tracking'
                )
            ),
        ),
        'entitymanager' => array(
            'admin' => array(
                'connection'    => 'admin',
                'configuration' => 'admin'
            ),
            'authentication' => array(
                'connection'    => 'authentication',
                'configuration' => 'authentication'
            ),
            'bizj' => array(
                'connection'    => 'bizj',
                'configuration' => 'bizj'
            ),
            'bizjstatus' => array(
                'connection'    => 'bizjstatus',
                'configuration' => 'bizjstatus',
            ),
            'bzjpreview' => array(
                'connection'    => 'bzjpreview',
                'configuration' => 'bzjpreview'
            ),
            'cms' => array(
                'connection'    => 'cms',
                'configuration' => 'cms'
            ),
            'datahub' => array(
                'connection'    => 'datahub',
                'configuration' => 'datahub'
            ),
            'email' => array(
                'connection'    => 'email',
                'configuration' => 'email'
            ),
            'medialibrary' => array(
                'connection'    => 'medialibrary',
                'configuration' => 'medialibrary'
            ),
            'nascarillustrated' => array(
                'connection'    => 'nascarillustrated',
                'configuration' => 'nascarillustrated'
            ),
            'tracking' => array(
                'connection'    => 'tracking',
                'configuration' => 'tracking'
            ),
        ),
        'eventmanager' => array(
            'orm_default' => array(
                'subscribers' => array(
                    'Entity\Subscriber\Timestampable',
                    'Entity\Subscriber\Validate',
                ),
            ),
        ),
    ),
);
