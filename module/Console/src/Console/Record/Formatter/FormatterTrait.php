<?php

namespace Console\Record\Formatter;

use DB\Datahub\SourceType;

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
     * @var \DB\Datahub\SourceType[]
     */
    protected static $sourceTypes;

    /**
     * FormatterAbstract constructor.
     *
     * blocks the new keyword
     */
    protected function __construct () {

        if ( is_null(self::$sourceTypes) ) {
            self::$sourceTypes = [];

            foreach ( SourceType::fetch() as $sourceType ) {
                self::$sourceTypes[$sourceType->name] = $sourceType;
            }
        }

    }

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
     * @param $data
     * @return array
     */
    abstract public function format ( $data );

}
