<?php

namespace Console;

/**
 * Class ConfigException
 * @package Console\DB\Error
 */
class CsvIteratorException extends \Exception
{

    /**
     * @return string
     */
    public function __toString()
    {

        return __CLASS__ . "::" . $this->message;
    }

}
