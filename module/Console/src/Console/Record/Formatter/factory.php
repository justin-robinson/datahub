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
     * @return FormatterInterface
     * @throws \Exception
     */
    public static function factory ( $name ) {

        $formatterClassName = __NAMESPACE__ . '\\Formatters\\' . $name;

        if ( class_exists ( $formatterClassName ) ) {
            $formatter = new $formatterClassName();
        } else {
            throw new NotFound( $formatterClassName );
        }

        return $formatter;
    }

}