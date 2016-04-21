<?php

namespace Console\DB\Error;

/**
 * Class ConfigException
 * @package Console\DB\Error
 */
class BufferException extends \Exception {

    /**
     * @return string
     */
    public function __toString () {

        return __CLASS__ . "::" . $this->message;
    }

}
