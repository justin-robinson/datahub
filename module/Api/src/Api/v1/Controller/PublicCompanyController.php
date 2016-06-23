<?php

namespace Api\v1\Controller;

use Api\v1\ResponseFormatter\CompanyProfileCollectionFormatter;
use Api\v1\ResponseFormatter\FormatterHelpers;
use DB\Datahub\Company;
use DB\Datahub\CompanyInstance;
use Elastica\Client;
use Elastica\Query;
use Elastica\QueryBuilder;
use Elastica\Search;
use Elasticsearch\ClientBuilder;
use Scoop\Database\Rows;
use Zend\View\Model\JsonModel;

/**
 * Class PublicCompanyController
 * @package Api\v1\Controller
 */
class PublicCompanyController extends AbstractRestfulController {

    /**
     * @var []
     */
    private $apiResponse;

    /**
     * PublicCompanyController constructor.
     */
    public function __construct () {
        $this->apiResponse = [];
    }

    /**
     * @return JsonModel
     */
    public function indexAction () {

        switch ( $_SERVER['REQUEST_METHOD'] ) {
            case 'GET':
                if( empty($_GET['search']) || !is_array( $_GET['search'] ) ) {
                    $this->apiResponse['error'] = "missing 'search' parameter array";
                    $this->apiResponse['ex'] = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?search[Name]=Google&search[State]=CA';
                    $this->apiResponse['searchTerms'] = $this->getElasticSearchTerms();
                } else {
                    $this->apiResponse = $this->_get( $_GET['search']);
                }
                break;
            case 'POST':

                $this->_post();
                break;
            default:
                $this->apiResponse->message = $_SERVER['REQUEST_METHOD'] . ' not allowed';
                break;
        }

        return new JsonModel($this->apiResponse);


    }

    /**
     * @param $elasticSearchTerms
     *
     * @return array|null
     */
    private function _get ( $elasticSearchTerms ) {

        
    }

    private function _post ( ) {
    }

    /**
     * @return array
     */
    private function getElasticSearchTerms () {
        
    }

}
