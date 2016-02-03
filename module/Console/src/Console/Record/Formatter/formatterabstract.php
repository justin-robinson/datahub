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
    public static function get_instance ( $name ) {

        $name = strtolower($name);

        if ( !isset (static::$instances[$name]) ) {
            static::$instances[$name] = new static();
        }

        return static::$instances[$name];
    }

    /**
     * @param $name
     *
     * @return string
     */
    public static function name_to_class ( $name ) {
        return __NAMESPACE__ . '\\Formatters\\' . $name;
    }

    /**
     * @param $data
     * @return array
     */
    abstract public function format ( $data );

}
