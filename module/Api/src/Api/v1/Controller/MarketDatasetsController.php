<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/13/16
 * Time: 10:11 AM
 */

namespace Api\v1\Controller;

use DB\Datahub\Dataset;
use Zend\View\Model\JsonModel;

class MarketDatasetsController extends AbstractRestfulController
{
    
    public function get($marketCode)
    {
        $sets = Dataset::fetch_where('market_code = ?', [$marketCode]);
        
        return new JsonModel($sets->to_array());
    }
}