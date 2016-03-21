<?php

namespace Services\Medialibrary;

use Services\AbstractService;

abstract class AbstractMediaService extends AbstractService
{
    /**
     * Most recent error detected.
     *
     * @var array
     * @access protected
     */
    protected $last_error = array();

    public function getLastError()
    {
        return $this->last_error;
    }

}
