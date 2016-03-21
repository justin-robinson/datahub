<?php

namespace Services\Controller;

use CMS\Controller\AbstractActionController;

class RefineryController extends AbstractActionController
{
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get('Services\Refinery\Search');
        $response = $service->byCompany('AT&T');
        
        var_dump($response);
        
        exit;
    }
}
