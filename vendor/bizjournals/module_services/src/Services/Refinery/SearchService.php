<?php

namespace Services\Refinery;

use Services\AbstractService;

class SearchService extends AbstractService
{
    public function byCompany($company)
    {
        // convert nonbreaking space characters to spaces
        $company = trim(preg_replace('|\s+|', ' ', preg_replace('|&nbsp;|', ' ', $company)));
        // remove all non alphanumeric and non space characters
        $company = preg_replace('/[^a-zA-Z0-9\s]+/', '', $company);

        $params = array(
            'excludet2'      => 1,
            'excludeDetails' => 1,
            'matchRequest'   => "<Company><Name>$company</Name><Ticker /><Address1 /><Address2 /><City /><State /><Zip /><URL /><Phone /><ContactFirstName /><ContactLastName /></Company>",
            'has_stories'    => 1,
        );
        
        return $this->getClient()->post($params);
    }
}
