<?php

namespace Console\Record\Formatter;

/**
 * Formats company data into named query parameters for pdo insertions
 *
 * Class FormatterAbstract
 * @package Console\Record
 */
interface FormatterInterface {

    /**
     * @return array
     */
    public function format ( $data );

}