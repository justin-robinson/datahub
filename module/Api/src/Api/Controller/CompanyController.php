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

    /**
     * @param mixed $company_id
     * @return JsonModel
     */
    public function delete($company_id)
    {
        return new JsonModel(['delete' => 'record deleted']);
    }


    /**
     * @param mixed $data
     * @return JsonModel
     */
    public function create($data){
        return new JsonModel(['create' => $data]);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @return JsonModel
     */
    public function update($id, $data){
        return new JsonModel(['update' => $data]);
    }

    /**
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(['getList' => 'not implemented']);
    }

}