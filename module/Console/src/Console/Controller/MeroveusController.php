<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 3:56 PM
 */

namespace Console\Controller;

use Services\Meroveus\Client;

use Services\Meroveus\CompanyService;

use Zend\Mvc\Controller\AbstractActionController;

class MeroveusController extends AbstractActionController
{
    public function indexAction()
    {
        $env = $this->getRequest()->getParam('env');
        echo "$env\n";
        return "$env\n";
    }

    public function requestAction()
    {
        $client = new Client();
        $companyService = new CompanyService($client);
        $company = $companyService->findCompanyById(2);
        echo "line 29". ' in '."MeroveusController.php".PHP_EOL;
        die(var_dump( $company ));

    }


}