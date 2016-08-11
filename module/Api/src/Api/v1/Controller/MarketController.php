<?php

namespace Api\v1\Controller;

use DB\Datahub\Market;
use Zend\View\Model\JsonModel;

/**
 * Class MarketController
 * @package Api\v1\Controller
 */
class MarketController extends AbstractRestfulController
{

    public function get($marketId)
    {

        $market = Market::fetch_by_id($marketId);
        if ($market) {
            return new JsonModel($market->to_array());
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function create($data)
    {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $market = new Market($data);
        if ($market->save()) {
            // get the actual timestamps
            $market->reload();
        }

        return new JsonModel($market->to_array());
    }

    public function update($marketId, $data)
    {

        // don't allow properties or states to be saved
        unset($data['stateId']);

        $market = Market::fetch_by_id($marketId);

        $statusCode = 204;

        if ($market) {
            $market->populate($data);
            $statusCode = $market->save() ? 200 : 500;
        }

        return $this->getResponse()->setStatusCode($statusCode);

    }

    public function delete($id)
    {

        $market = Market::fetch_by_id($id);
        if ($market) {
            $market->delete();
        }

        return $this->getResponse()->setStatusCode(204);
    }

    public function getList()
    {

        $markets = Market::fetch_where('1');

        if ($markets === false) {
            return $this->getResponse()->setStatusCode(204);
        }

        return new JsonModel($markets);
    }
}
