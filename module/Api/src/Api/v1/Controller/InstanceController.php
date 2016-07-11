<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\InstanceCollectionFormatter;
use Api\v1\ResponseFormatter\InstanceFormatter;
use DB\Datahub\CompanyInstance;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceController
 * @package Api\v1\Controller
 */
class InstanceController extends AbstractRestfulController
{

    /**
     * @param $companyInstanceId
     *
     * @return null|JsonModel
     */
    public function get($companyInstanceId)
    {

        $instance = CompanyInstance::fetch_by_id($companyInstanceId);
        if ($instance) {
            return new JsonModel(InstanceFormatter::format($instance));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {

        // don't allow properties or contacts to be saved
        unset($data['companyInstanceId']);
        unset($data['properties']);
        unset($data['contacts']);

        $instance = new CompanyInstance($data);
        if ($instance->save()) {
            // get the actual timestamps
            $instance->reload();
        }

        return new JsonModel(InstanceFormatter::format($instance));
    }

    /**
     * @param mixed $companyInstanceId
     * @param mixed $data
     *
     * @return null|JsonModel
     */
    public function update($companyInstanceId, $data)
    {

        // don't allow properties or contacts to be saved
        unset($data['companyInstanceId']);
        unset($data['properties']);
        unset($data['contacts']);

        $instance = CompanyInstance::fetch_by_id($companyInstanceId);

        if ($instance) {
            $instance->populate($data);
            $instance->save();
            $instance->reload();

            return new JsonModel(InstanceFormatter::format($instance));
        }

        return $this->getResponse()->setStatusCode(204);

    }

    /**
     * @param mixed $id
     *
     * @return null|JsonModel
     */
    public function delete($id)
    {

        $instance = CompanyInstance::fetch_by_id($id);
        if ($instance) {
            $instance->delete();
            $instance = CompanyInstance::query('SELECT * FROM datahub.companyInstance WHERE companyInstanceId = ?',
                [$id])->first();

            return new JsonModel(InstanceFormatter::format($instance));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    /**
     * @return null|JsonModel
     */
    public function getList()
    {

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);

        $instances = CompanyInstance::fetch($limit, $offset);

        if ($instances) {
            return new JsonModel(InstanceCollectionFormatter::format($instances, $page, $limit));
        }

        return $this->getResponse()->setStatusCode(204);

    }
}
