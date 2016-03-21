<?php

namespace Services\Elastica\Client;

use Elastica\Search;
use Services\Elastica\AbstractClient;

class Video extends AbstractClient
{
    protected $main_index = 'video_current';

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
    public function searchContent($searchTerm = '*', $filters = array(), $fields = array(), $sort = array(array('_score' => 'desc'), array('date_revised' => 'desc')), $options = array())
    {
        #$this->getServiceLocator()->get('Logger')->debug('searchTerm called');

        $filterObjects = array();
        foreach ($filters as $filterKey => $filterValue) {
            switch ($filterKey) {
                case '_id':
                    if (is_array($filterValue)) {
                        $elasticaFilterId = new \Elastica\Filter\Ids(null, $filterValue);
                    } else {
                        $elasticaFilterId = new \Elastica\Filter\Ids(null, array($filterValue));
                    }
                    $filterObjects[] = $elasticaFilterId;
                    break;
                case 'start_date':
                case 'end_date':
                    break;
                case 'body':
                case 'headline':
                    $elasticaQuery = new \Elastica\Query\QueryString($filterKey . ':' . \Elastica\Util::escapeTerm($filterValue));
                    $elasticaFilter = new \Elastica\Filter\Query($elasticaQuery);
                    $elasticaFilter->setName($filterKey);
                    $filterObjects[] = $elasticaFilter;
                    break;
                case 'pub_code':
                    if (isset($filterValue['all_markets'])) {
                        if (isset($filterValue['hide_bloomberg'])) {
                            $termFilter = new \Elastica\Filter\Term();
                            $termFilter->setTerm('pub_code', 'bloomberg');
                            $marketFilter = new \Elastica\Filter\BoolNot($termFilter);
                        } else {
                            $marketFilter = $termFilter;
                        }
                    } else {
                        $termFilter = new \Elastica\Filter\Term();
                        $termFilter->setTerm('pub_code', $filterValue['market_code']);
                        if (!isset($filterValue['hide_bloomberg'])) {
                            $termFilter2 = new \Elastica\Filter\Term();
                            $termFilter2->setTerm('pub_code', 'bloomberg');
                            $marketFilter = new \Elastica\Filter\BoolOr();
                            $marketFilter->addFilter($termFilter);
                            $marketFilter->addFilter($termFilter2);
                        } else {
                            $marketFilter = $termFilter;
                        }
                    }
                
                    if (!empty($marketFilter)) {
                        $filterObjects[] = $marketFilter;
                    }
                    break;
                case 'pub_bloomberg':
                    $termFilter = new \Elastica\Filter\Term();
                    $termFilter->setTerm('pub_id', $filterValue);
                    $termFilter2 = new \Elastica\Filter\Term();
                    $termFilter2->setTerm('pub_code', 'bloomberg');
                    $mktFilter = new \Elastica\Filter\BoolOr();
                    $mktFilter->addFilter($termFilter);
                    $mktFilter->addFilter($termFilter2);
                    $filterObjects[] = $mktFilter;
                    break;
                default:
                    $termFilter = new \Elastica\Filter\Term();
                    $termFilter->setTerm($filterKey, $filterValue);
                    $filterObjects[] = $termFilter;
                    break;
            }
        }

        if (!empty($filters['start_date']) || !empty($filters['end_date'])) {
            $elasticaFilterDate = new \Elastica\Filter\Range();
            $filterOptions = array();
            $elasticaFilterDate->setName('range_dates');

            if (!empty($filters['start_date'])) {
                $startDate = new \DateTime($filters['start_date']);
                $filterOptions['gte'] = $startDate->format('c');
            }
            if (!empty($filters['end_date'])) {
                $endDate = new \DateTime($filters['end_date'] . '23:59:59');
                $filterOptions['lte'] = $endDate->format('c');
            }
            $elasticaFilterDate->addField('date_created', $filterOptions);
            $filterObjects[] = $elasticaFilterDate;
        }

        $elasticaQuery = new \Elastica\Query();

        // Create the actual search object with some data.
        $searchTermSend = (!empty($searchTerm) && ($searchTerm != '*')) ? \Elastica\Util::escapeTerm($searchTerm) : '*';
        // unescape phrases
        $searchTermSend = str_replace('\"', '"', $searchTermSend);
        // capitalize booleans
        $searchTermSend = str_replace(' and ', ' AND ', $searchTermSend);
        $searchTermSend = str_replace(' or ', ' OR ', $searchTermSend);

        $elasticaQueryString = new \Elastica\Query\QueryString($searchTermSend);
        $elasticaQueryString->setUseDisMax(true);
        $elasticaQueryString->setAutoGeneratePhraseQueries(true);
        if (isset($options['queryfields'])) {
            $elasticaQueryString->setFields($options['queryfields']);
        }
        // this doesn't work right... elasticsearch returns empty fields instead
        // of what we requested
        #if (!empty($fields)) {
        #    $elasticaQuery->setFields($fields);
        #}
        if (isset($options['default_operator'])) {
            $elasticaQueryString->setDefaultOperator($options['default_operator']);
        }

        if (!empty($filterObjects)) {
            if (count($filterObjects) == 1) {
                $elasticaQuery->setFilter($filterObjects[0]);
            } else {
                $elasticaFilterAnd = new \Elastica\Filter\BoolAnd();
                foreach ($filterObjects as $filter) {
                    $elasticaFilterAnd->addFilter($filter);
                }
                $elasticaQuery->setFilter($elasticaFilterAnd);
            }
        }

        if (!isset($options['no_facets'])) {
            $facets = array();
            if (!empty($options['facets'])) {
                $facets = $options['facets'];
            } else {
                // These are the default facets
                $facets = array(
                    'pub_name' => array(
                        'field' => 'pub_name',
                        'type' => 'terms',
                    ),
                );
            }
            if (!empty($facets)) {
                foreach ($facets as $facetName => $facetOptions) {
                    if (!isset($facetOptions['type']) || empty($facetOptions['type'])) {
                        $facetOptions['type'] = 'terms';
                    }
                    if (!isset($facetOptions['size']) || empty($facetOptions['size'])) {
                        $facetOptions['size'] = 100;
                    }
                    if (!isset($facetOptions['order']) || empty($facetOptions['order'])) {
                        $facetOptions['order'] = 'count';
                    }
                    if (!isset($facetOptions['field']) || empty($facetOptions['field'])) {
                        // required
                        $this->getServiceLocator()->get('Logger')->err("Skipping facet $facetName because no field defined");
                        continue;
                    }
                    switch ($facetOptions['type']) {
                        case 'terms':
                            $elasticaFacet = new \Elastica\Facet\Terms($facetName);
                            $elasticaFacet->setSize($facetOptions['size']);
                            $elasticaFacet->setOrder($facetOptions['order']);
                            $elasticaFacet->setField($facetOptions['field']);
                            // now we need to apply our query to the facet so we only
                            // get facet values that are within our results
                            if (!empty($filterObjects)) {
                                if (count($filterObjects) == 1) {
                                    $elasticaFacet->setFilter($filterObjects[0]);
                                } else {
                                    $elasticaFilterAnd = new \Elastica\Filter\BoolAnd();
                                    foreach ($filterObjects as $filter) {
                                        $elasticaFilterAnd->addFilter($filter);
                                    }
                                    $elasticaFacet->setFilter($elasticaFilterAnd);
                                }
                            }
                            $elasticaQuery->addFacet($elasticaFacet);
                            $elasticaFacet->setGlobal(false);
                            break;
                        default:
                            # unhandled facet type
                            $this->getServiceLocator()->get('Logger')->err("Unhandled facet type {$facetOptions['type']}");
                            break;
                    }
                }
            }
        }

        if (!empty($sort)) {
            $elasticaQuery->setSort($sort);
        }

        $elasticaQuery->setQuery($elasticaQueryString);

        return $this->search($elasticaQuery, '\Services\Elastica\ResultSet\Video', $options);
    }
}
