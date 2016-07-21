<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\PropertyFormatter;
use DB\Datahub\CompanyInstanceProperty;
use Zend\View\Model\JsonModel;

/**
 * Class InstanceController
 * @package Api\v1\Controller
 */
class PropertyController extends AbstractRestfulController
{

    public function get($companyInstancePropertyId)
    {

        $property = CompanyInstanceProperty::fetch_by_id($companyInstancePropertyId);
        if ($property) {
            return new JsonModel(PropertyFormatter::format($property));
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {

        // don't allow properties or contacts to be saved
        unset($data['companyInstancePropertyId']);

        $property = new CompanyInstanceProperty($data);
        if ($property->save()) {
            // get the actual timestamps
            $property->reload();
        }

        return new JsonModel(PropertyFormatter::format($property));
    }

    public function update($companyInstancePropertyId, $data)
    {

        // don't allow properties or contacts to be saved
        unset($data['companyInstancePropertyId']);

        $property = CompanyInstanceProperty::fetch_by_id($companyInstancePropertyId);
        
        $statusCode = 204;

        if ($property) {
            $property->populate($data);
            $statusCode = $property->save() ? 200 : 500;
        }

        return $this->getResponse()->setStatusCode($statusCode);

    }

    public function delete($id)
    {

        $property = CompanyInstanceProperty::fetch_by_id($id);
        if ($property) {
            $property->delete();
        }

        return $this->getResponse()->setStatusCode(204);
    }
}
