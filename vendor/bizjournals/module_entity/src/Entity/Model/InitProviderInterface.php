<?php

namespace Entity\Model;

interface InitProviderInterface
{
    /**
     * Initialize workflow
     *
     * @return void
     */
    public function init();
}
