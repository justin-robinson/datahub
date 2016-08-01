<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\PropertyCollectionFormatter;
use DB\Datahub\CompanyInstance;
use DB\Datahub\CompanyInstanceProperty;
use DB\Datahub\SourceType;
use Scoop\Database\Model\Generic;
use Scoop\Database\Query\Buffer;
use Zend\View\Model\JsonModel;

/**
 * Class InstancePropertiesController
 * @package Api\v1\Controller
 */
class InstancePropertiesController extends AbstractRestfulController
{

    public function get($companyInstanceId)
    {

        $page = $this->params()->fromQuery('page', 1);
        $page = (is_numeric($page) && $page >= 1) ? (int)$page : 1;
        $limit = $this->params()->fromQuery('limit', 1000);
        $offset = $limit * ($page - 1);

        $properties = CompanyInstanceProperty::fetch_where('companyInstanceId = ?', [$companyInstanceId], $limit,
            $offset);

        if ($properties) {
            $count = Generic::query('SELECT count(*) AS count FROM companyInstanceProperty WHERE companyInstanceId = ?',
                [$companyInstanceId])->first()->count;

            return new JsonModel(PropertyCollectionFormatter::format($properties, $page, $limit,
                "/api/v1/instance/{$companyInstanceId}/properties", $count));
        }

        return $this->getResponse()->setStatusCode(204);

    }


    /*********************************************************

     THESE ARE FROM HELL

     So we were aske to merge our post and put methods into one 'intelligent' one

     Dave nor I approved of this practice but here I am in front of you
     just doing what I'm asked instead of doing what I know is best :(

     **********************************************************/

    /**
     * Oh?! you wanted to post, well it's gonna be a put, they may need to still be a post so idk
     */
    public function create($data) {

        $companyInstanceId = $this->params()->fromRoute('id');

        return $this->update($companyInstanceId, $data);
    }

    /**
     * everything is a PUT, but it could be a post, so we have to figure that out. Why? Please pray for me
     */
    public function update($companyInstanceId, $data) {

        // gotta send us something
        if ( empty($data) || !is_array($data)) {
            return $this->getResponse()->setStatusCode(204);
        }

        // does the company instance you are talking about EVEN EXIST!?
        $companyInstance = CompanyInstance::fetch_by_id($companyInstanceId);
        if ( $companyInstance === false ) {
            return $this->getResponse()->setStatusCode(204);
        }


        $response = [
            'propertyIds' => array_fill(0, count($data), -1),
            ];

        foreach ( $data as $index => &$propertyData ) {

            // create a model for the post
            $p = new CompanyInstanceProperty($propertyData);

            // find out if this property is in the db aka THIS IS A PUT
            $property = CompanyInstanceProperty::fetch_one_where(
                'name = ? AND valueMd5 = ? AND sourceTypeId = ?',
                [
                    $p->name,
                    $p->valueMd5,
                    $p->sourceTypeId
                ]);

            // if we didn't find it in the db, then it's a PUT
            if ( $property === false ) {
                $property = $p;
            } else {
                $property->populate($propertyData);
            }

            $property->companyInstanceId = $companyInstanceId;

            if ( $property->save() ) {
                $response['propertyIds'][$index] = $property->companyInstancePropertyId;
            }
        }

        $this->getResponse()->setStatusCode(201);
        return new JsonModel($response);
    }
}
