<?php

namespace Console\Record\Formatter;

/**
 * Factory for record formatters
 *
 * Class Factory
 * @package Console\Record
 */
abstract class Factory {

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public static function factory ( $name ) {

        $formatterClassName = __NAMESPACE__ . '\\' . $name;

        if ( class_exists ( $formatterClassName ) ) {
            $formatter = new $formatterClassName();
        } else {
            throw new \Exception( 'Formatter class not found: ' . $formatterClassName );
        }

        return $formatter;
    }

}