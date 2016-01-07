<?php
/**
 * User: daveb
 * Date: 1/6/16
 * Time: 4:43 PM
 */

namespace Api\Controller;

use Zend\View\Model\JsonModel;

/**
 * Class CompanyController
 * @package Api\Controller
 */
class CompanyController extends AbstractRestfulController
{
    /**
     * @param mixed $company_id
     * @return JsonModel
     */
    public function get($company_id)
    {
        /** @var $company \Hub\Model\Company * */
        $company = $this->getServiceLocator()->get('\Hub\Model\Company');
        /** @var $record \Hub\Model\Company * */
        $record = $company->findOneBy(['hub_id' => $company_id]);

        $return = new JsonModel($record->toArray(true));
        return $return;
    }
}