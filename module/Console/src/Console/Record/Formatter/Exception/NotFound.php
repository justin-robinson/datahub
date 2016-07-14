<?php

namespace Console\Record\Formatter\Exception;

/**
 * Class ClassNotFound
 * @package Console\Record\Formatter\Exception
 */
class NotFound extends \Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {

        $message = "Formatter class not found: : [$message]";

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function __toString()
    {

        return "Formatter class not found: : [{$this->getCode()}]: {$this->getMessage()}" . PHP_EOL;
    }

}
