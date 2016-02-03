<?php

namespace Console\Record\Formatter;

/**
 * Singleton that formats company data into named query parameters for pdo insertions
 *
 * Class FormatterAbstract
 * @package Console\Record
 */
abstract class FormatterAbstract {

    /**
     * @var FormatterAbstract[]
     */
    protected static $instances = [];

    /**
     * FormatterAbstract constructor.
     *
     * blocks the new keyword
     */
    protected function __construct () {
    }

    /**
     * So we can't clone
     */
    protected function __clone(){
    }

    /**
     * So we can't unserialize an instance
     */
    protected function __wakeup () {
    }

    /**
     * @return FormatterAbstract
     */
    public static function get_instance () {

        $class = get_called_class();

        if ( !isset (static::$instances[$class]) ) {
            static::$instances[$class] = new static();
        }

        return static::$instances[$class];
    }

    /**
     * @param $data
     * @return array
     */
    abstract public function format ( $data );

}
