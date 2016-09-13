<?php
/**
 * Created by PhpStorm.
 * User: dbullard
 * Date: 9/13/16
 * Time: 10:11 AM
 */

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\DatasetFormatter;
use DB\Datahub\Dataset;
use DB\Datahub\DatasetEntries;
use Zend\View\Model\JsonModel;

class MarketDatasetsController extends AbstractRestfulController
{
    
    public function get($marketCode)
    {
        $sets = Dataset::fetch_where('market_code = ?', [$marketCode]);
        
        return new JsonModel($sets->to_array());
    }
}