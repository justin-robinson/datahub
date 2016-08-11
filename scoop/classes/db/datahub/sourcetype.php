<?php

namespace DB\Datahub;

use LRUCache\LRUCache;

/**
 * Class SourceType
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/09
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class SourceType extends \DBCore\Datahub\SourceType {

    /**
     * @var LRUCache
     */
    protected static $cache;

    /**
     * @param int    $limit
     * @param int    $offset
     * @param string $where
     * @param array  $queryParams
     *
     * @return bool|int|mixed|\Scoop\Database\Rows
     */
    protected static function fetch ( $limit = 1000, $offset = 0, $where = '', array $queryParams = [] ) {
        
        if ( !isset(static::$cache) ) {
            static::$cache = new LRUCache( 100 );
        }

        $key = "{$limit}-{$offset}-{$where}-" . implode('-', $queryParams);
        
        if ( static::$cache->exists($key) ) {
            return static::$cache->get($key);
        }
        
        $self = parent::fetch($limit, $offset, $where, $queryParams);
        static::$cache->put($key, $self);

        return $self;
    }



}

?>
