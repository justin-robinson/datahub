<?php

namespace Services\Medialibrary;

use Services\AbstractService;

class SearchService extends AbstractMediaService
{
    /**
     * @var array
     */
    protected $response;
    
    /**
     * Send search request to medialibrary
     * 
     * @param array $params
     * @return multitype:
     */
    public function search(array $params = array())
    {
        try {
            if (empty($params['pub_id'])) {
                $params['pub_id'] = $this->getServiceLocator()->get('Publication')->getPubId();
            }
            
            if (empty($params['limit'])) {
                $params['limit'] = 200;
            }
            
            $result = $this->getClient()->post('search', $params);
            
            $this->response = $result['medialibrary']['search'];
            
            return $this->getResults();
        } catch (\Exception $e) {
            return array();
        }
    }
    
    /**
     * Return results from api response
     * 
     * @return array|null
     */
    public function getResults()
    {
        return isset($this->response['results']) ? $this->response['results'] : null;
    }
    
    /**
     * Return aggregations from api response
     *
     * @return array|null
     */
    public function getAggregations()
    {
        return isset($this->response['aggregations']) ? $this->response['aggregations'] : null;
    }
}
