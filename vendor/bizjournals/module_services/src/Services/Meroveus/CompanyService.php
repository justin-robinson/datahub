<?php
/**
 * User: daveb
 * Date: 12/10/15
 * Time: 9:42 AM
 */

namespace Services\Meroveus;

use Services\AbstractService;
use Zend\Json;

/**
 * Class CompanyService
 * @package Services\Meroveus
 */
class CompanyService extends AbstractService
{

    /**
     * @param $client \Services\Meroveus\Client
     * @param $id
     *
     * @return string
     */
    public function findCompanyById($id)
    {
        $request = 'a bunch of meroveus control stuff';

        /** @var $client \Services\Meroveus\Client*/
        $client = $this->getClient();
//        $result = $client->sendRequest($request);
        $result = ['test'=>'value' .$id];
        // this will filter out all of the crap that's not needed
        return Json\Json::encode($result);
    }
}