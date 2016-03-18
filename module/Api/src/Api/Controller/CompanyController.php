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
 *
 * @package Api\Controller
 */
class CompanyController extends AbstractRestfulController
{
    /**
     * REST action mapped to GET with an 'id'
     *
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function get($companyId)
    {
        return $this->lookupBy('hub_id', $companyId);
    }

    /**
     * REST action mapped to DELETE
     *
     * @param mixed $companyId
     *
     * @return JsonModel
     */
    public function delete($companyId)
    {
        return new JsonModel(['delete' => 'record deleted']);
    }


    /**
     * REST action mapped to POST
     *
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(['create' => $data]);
    }

    /**
     * REST action mapped to PUT
     *
     * @param mixed $id
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel(['update' => $data]);
    }

    /**
     * REST action mapped to GET without an 'id'
     *
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(['getList' => 'not implemented']);
    }

    /**
     * @return JsonModel
     * this is a bridge method to look up companies by the refinery_id
     * since datahub will eventually replace refinery, it will be depricated
     * at that time
     */
    public function  refineryAction()
    {

        // get id from url
        $refineryId = $this->params()->fromRoute('id');

        return $this->lookupBy('refinery_id', $refineryId);
    }

    /**
     * @param $name
     * @param $id
     *
     * @return JsonModel
     */
    private function lookupBy($name, $id)
    {
        // load company model
        /** @var $company \Hub\Model\Company */
        $company = $this->getServiceLocator()->get('\Hub\Model\Company');
        // find company by refinery_id in url
        $record = $company->findOneBy([$name => $id]);

        // ensure we don't return something falsey
        $record = empty($record) ? [
            'success'  => false,
            'messsage' => 'not found',
        ] : $record->toArray(true);

        // return
        return new JsonModel($record);

    }

}