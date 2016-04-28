<?php

namespace Api\Controller;

use Api\Response\PublicCompanyResponse;
use Elastica\Client;
use Elastica\Query;
use Elastica\QueryBuilder;
use Elastica\Search;
use Elasticsearch\ClientBuilder;
use Zend\View\Model\JsonModel;

/**
 * Class PublicCompanyController
 * @package Api\Controller
 */
class PublicCompanyController extends AbstractRestfulController {

    /**
     * @var PublicCompanyResponse
     */
    private $apiResponse;

    /**
     * PublicCompanyController constructor.
     */
    public function __construct () {
        $this->apiResponse = new PublicCompanyResponse();
    }

    /**
     * @return JsonModel
     */
    public function indexAction () {

        switch ( $_SERVER['REQUEST_METHOD'] ) {
            case 'GET':
                if( empty($_GET['search']) || !is_array( $_GET['search'] ) ) {
                    $this->apiResponse->message = "missing 'search' parameter array";
                } else {
                    $this->_get( $_GET['search']);
                }
                break;
            case 'POST':

                $this->_post();
                break;
            default:
                $this->apiResponse->message = $_SERVER['REQUEST_METHOD'] . ' not allowed';
                break;
        }

        return new JsonModel($this->apiResponse->toArray());


    }

    /**
     * @param $elasticSearchTerms
     */
    private function _get ( $elasticSearchTerms ) {

        // load our datahub config
        $config = $this->getServiceLocator()->get( 'Config' )['elastica-datahub'];

        // create the elastic client
        $elasticClient = ClientBuilder::create()
                                      ->setHosts( [ $config['host'] . ':' . $config['port'] ] )
                                      ->build();

        // our elastic query
        $params = [
            'index' => 'companies',
            'type'  => 'company',
            'body'  => [
                'query' => [
                    'bool' => [
                        'should' => [ ],
                    ],
                ],
            ],
        ];

        // add all search terms to the elastic query
        foreach ( $elasticSearchTerms as $searchTermName => &$searchTerm ) {
            $params['body']['query']['bool']['must'][] = [ 'match' => [ $searchTermName => $searchTerm ] ];
        }

        // query elastic
        $elasticResponse = $elasticClient->search( $params );

        // did we get a hit?
        if( isset($elasticResponse['hits']['hits'][0]) ) {

            // find company by refinery_id in url
            $record = $this->getServiceLocator()->get( '\Hub\Model\Company' )
                           ->findOneBy(
                               [ 'refinery_id' => $elasticResponse['hits']['hits'][0]['_source']['InternalId'] ] );

            // we find?
            if ( $record ) {
                $this->apiResponse->success = true;
                $this->apiResponse->body = $record->toArray( true );
            } else {
                $this->apiResponse->message = 'record not found';
            }
        } else {
            $this->apiResponse->message = 'match not found';
        }
    }

    private function _post ( ) {
    }

}
