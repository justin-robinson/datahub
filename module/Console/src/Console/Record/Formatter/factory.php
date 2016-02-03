<?php

namespace Console\Record\Formatter;

use Console\Record\Formatter\Exception\NotFound;

/**
 * Factory for record Formatters
 *
 * Class Factory
 * @package Console\Record
 */
abstract class Factory {

    /**
     * @param $name
     * @return FormatterAbstract
     * @throws \Exception
     */
    public static function factory ( $name ) {

        $formatterClassName = __NAMESPACE__ . '\\Formatters\\' . $name;

        if ( class_exists ( $formatterClassName ) ) {
            return call_user_func_array([$formatterClassName, 'get_instance'], []);
        } else {
            throw new NotFound( $formatterClassName );
        }
    }

}
