<?php

namespace Hub\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        return array('message' => 'Hello World');
    }
}
