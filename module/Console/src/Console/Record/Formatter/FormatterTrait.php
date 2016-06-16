<?php

namespace Console\Record\Formatter;

use DB\Datahub\Company;
use DB\Datahub\Market;
use LRUCache\LRUCache;

/**
 * Singleton that formats company data into named query parameters for pdo insertions
 *
 * Class FormatterAbstract
 * @package Console\Record
 */
trait FormatterTrait {

    /**
     * @var FormatterTrait
     */
    protected static $instance;

    /**
     * @var \LRUCache\LRUCache
     */
    protected static $marketsCache;

    /**
     * @var \LRUCache\LRUCache
     */
    protected static $statesCache;

    /**
     * So we can't clone
     */
    protected function __clone() {
    }

    /**
     * So we can't unserialize an instance
     */
    protected function __wakeup () {
    }

    private function init () {

        if( is_null( self::$marketsCache ) ) {
            self::$marketsCache = new LRUCache( 50 );
        }

        if( is_null( self::$statesCache ) ) {
            self::$statesCache = new LRUCache( 50 );
        }
    }

    /**
     * @return FormatterTrait
     */
    public static function get_instance () {

        if ( !isset (static::$instance) ) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param $city
     * @param $stateCode
     *
     * @return bool|int|mixed|\Scoop\Database\Model\Generic|\Scoop\Database\Rows
     */
    private function get_market_by_city_state ( $city, $stateCode ) {

        $marketKey = strtolower( $city . $stateCode );

        $market = self::$marketsCache->get( $marketKey );

        if( !$market ) {
            $market = Market::query(
                "SELECT
              m.*
            FROM
              `datahub`.`msa_pmsa` msa
              INNER JOIN `datahub`.`market_msa_pmsa_map` USING ( sa_code )
              INNER JOIN `datahub`.`market` m USING ( market_id )
            WHERE
              msa.sa_name = ?
            LIMIT 1",
                [ "{$city}, {$stateCode}" ]
            );

            if( $market ) {
                $market = $market->first();
            }

            self::$marketsCache->put( $marketKey, $market );

        }

        return $market;
    }

    /**
     * @param $data
     * @return Company
     */
    abstract public function format ( $data );

}
