<?php
/**
 * User: daveb
 * Date: 1/13/16
 * Time: 3:18 PM
 */

namespace Api\Controller;

use Zend\View\Model\JsonModel;

class ContactsController extends AbstractRestfulController
{
    /**
     * @param mixed $contactInstanceId
     * 
*@return JsonModel
     */
    public function get ( $contactInstanceId)
    {
        /** @var $company \Hub\Model\Company * */
        $company = $this->getServiceLocator()->get('\Hub\Model\Contact');
        /** @var $record \Hub\Model\Company * */
        $record = $company->findOneBy(['hub_id' => $contactInstanceId]);

        $return = new JsonModel($record->toArray(true));
        return $return;
    }

    /**
     * @param mixed $contactId
     * @return JsonModel
     */
    public function delete($contactId)
    {
        return new JsonModel(['delete' => 'record deleted']);
    }


    /**
     * @param mixed $data
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(['create' => $data]);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @return JsonModel
     */
    public function update($id, $data)
    {
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
