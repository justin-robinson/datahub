<?php
/**
 * Global Application Config
 */
return array(
    /**
     * The configs from each module will be merged with the global config in
     * the order in which they are defined.  This is important to note when
     * extending or overwriting configs in third party modules. 
     */
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'Entity',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './src',
            './vendor',
        ),
        
        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        // 'config_cache_enabled' => true,
        
        // The key used to create the configuration cache file name.
        // 'config_cache_key' => \Zend\Version\Version::VERSION,
        
        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        // 'module_map_cache_enabled' => true,
        
        // The key used to create the class map cache file name.
        // 'module_map_cache_key' => \Zend\Version\Version::VERSION,
        
        // The path in which to cache merged configuration.
        // 'cache_dir' => __DIR__ . '/../data/cache/module',
    ),
);
