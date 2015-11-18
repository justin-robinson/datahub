<?php

namespace Services\Elastica;

use Elastica\Client as ElasticaClient;
use Elastica\Search;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

abstract class AbstractClient extends ElasticaClient implements ServiceLocatorAwareInterface
{
    protected $main_index;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    protected $_logger;

    /**
     * Set serviceManager instance
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return void
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Set index
     */
    public function setIndex($indexName = '')
    {
        $this->main_index = $indexName;
    }

    /**
     * Set result set class
     */
    public function setResultset($resultsetClass = '')
    {
        $this->resultset = $resultsetClass;
    }

    /**
     * Get result set class
     */
    public function getResultset()
    {
        return $this->resultset;
    }

    /**
     * Retrieve serviceManager instance
     *
     * @return ServiceManager
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function getMainIndex()
    {
        return $this->getIndex($this->main_index);
    }

    public function getMainIndexName()
    {
        return $this->main_index;
    }

    /**
     * Gets all the type mappings for an index.
     *
     * @return array
     */
    public function getMapping()
    {
        return $this->getMainIndex()->getMapping();
    }

    /**
     * Get fields from mapping
     *
     * @return array
     */
    public function getFields($index = 'content_current', $type = 'story')
    {
        $mapping = $this->getMapping();
        return array_keys($mapping[$index][$type]['properties']);
    }

    /**
     * Searches in this index
     *
     * @param  \Elastica\Query $query      Array with all query data inside or a Elastica\Query object
     * @param  int|array                   $options OPTIONAL Limit or associative array of options (option=>value)
     * @return \Elastica\ResultSet         ResultSet with all results inside
     * @see \Elastica\SearchableInterface::search
     */
    public function search($query, $resultSet, $options = null)
    {
        $search = new Search($this);
        $index = $this->getMainIndex();

        if (isset($options['limit'])) {
            $query->setSize($options['limit']);
        } else {
            $query->setSize(500);
        }

        if (isset($options['start']) && ($options['start'] > 0)) {
            $query->setFrom($options['start']);
        }

        if (isset($options['types']) && (is_array($options['types']))) {
            foreach ($options['types'] as $type) {
                $type = $index->getType($type);
                $search->addType($type);
            }
        }

        // Search on the index.
        $search->addIndex($index);

        $response = $this->request(
            $search->getPath(),
            \Elastica\Request::GET,
            $query->toArray()
        );
        $resultSet = new $resultSet($response, $query);
        $resultSet->setServiceLocator($this->serviceLocator);
        return $resultSet;
    }

    /**
     * Search content
     *
     * Limitations on flexibility:
     * -Uses dismax
     * -Filters are ANDed
     * -Term uses QueryString
     *
     * If you are trying to match something and don't have the exact value (case, etc.) and need to match
     * the tokenized version then it should be added to the searchTerm string (lucene syntax) as
     * filters will do via exact match (Term)
     *
     * @params string search term in lucene syntax
     * @params array filters in key=>val
     * @params array fields to restrict search in flat array
     * @params array sort
     * @params array options - limit, start, default_operator, types
     *
     */
    abstract public function searchContent($searchTerm = '*', $filters = array(), $fields = array(), $sort = array(array('_score' => 'desc'), array('date_revised' => 'desc')), $options = array());

    public function formatFacets($facets)
    {
        if (!empty($facets)) {
            foreach ($facets as $facetName => $facetValues) {
                if (!empty($facetValues['terms'])) {
                    foreach ($facetValues['terms'] as $index => $termArray) {
                        if ($facetName == '_type') {
                            $facets[$facetName]['terms'][$index]['displayTerm'] = ucwords($termArray['term']);
                        } else {
                            $facets[$facetName]['terms'][$index]['displayTerm'] = $termArray['term'];
                        }
                    }
                }
            }

        }
        return $facets;
    }

    /**
     * Update document, using update script. Requires elasticsearch >= 0.19.0
     *
     * @param  int                  $id      document id
     * @param  array|\Elastica\Script|\Elastica\Document $data    raw data for request body
     * @param  string               $index   index to update
     * @param  string               $type    type of index to update
     * @param  array                $options array of query params to use for query. For possible options check es api
     * @return \Elastica\Response
     * @link http://www.elasticsearch.org/guide/reference/api/update.html
     */
    public function updateDocument($id, $data, $index, $type, array $options = array())
    {
        try {
            return parent::updateDocument($id, $data, $index, $type, $options);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * logging
     *
     * @param string|\Elastica\Request $context
     * @throws Exception\RuntimeException
     */
    protected function _log($context)
    {
        $log = $this->getConfig('log');
        if ($log) {
            if (!isset($this->_logger)) {
                $this->_logger = $this->getServiceLocator()->get('Logger');
            }
            // elastic log method tries to send a string + array to the logger... ZF2 only supports a string
            if ($context instanceof Request) {
                $data = $context->toArray();
            } else {
                $data = array('message' => $context);
            }
            $this->_logger->debug('Elastica: ' . print_r($data, true));
        }
    }
}
