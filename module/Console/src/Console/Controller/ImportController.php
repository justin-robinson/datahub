<?php

namespace Console\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ImportController extends AbstractActionController
{
    /**
     * Just echo the environment
     *
     * @access pubic
     * @return void
     */
    public function indexAction()
    {
        $env = $this->getRequest()->getParam('env');
        echo "$env\n";
        return "$env\n";
    }

    /**
     * Testing 1.2.3.... Testing...
     *
     * @access pubic
     * @return void
     */
    public function testAction()
    {
        $this->getServiceLocator()->get('Console\Logger')->info('test');
        echo "Hello World\n";

    }

    /**
     * Import the refinery data from a CSV file
     *
     * @access pubic
     * @return void
     */
    public function refineryimportAction()
    {
        echo "Hello World\n";
    }

}
