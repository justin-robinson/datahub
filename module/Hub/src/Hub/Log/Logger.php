<?php

namespace Hub\Log;

use Zend\Log\Logger as ZendLogger;

class Logger extends ZendLogger
{
    public function getPriorityName($priority)
    {
        return isset($this->priorities[$priority]) ? $this->priorities[$priority] : null;
    }
}
