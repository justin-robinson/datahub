<?php

namespace Console\Controller;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {

        $env = $this->getRequest()->getParam('env');
        echo "$env\n";

        return "$env\n";
    }

    public function testAction()
    {

        $this->getServiceLocator()->get('Console\Logger')->info('test');
    }
}
