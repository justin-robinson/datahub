<?php

namespace Services\Elastica\ResultSet;

use Services\Elastica\AbstractResultSet;

/**
 * Elastica result set
 *
 * List of all hits that are returned for a search on elasticsearch
 * Result set implements iterator
 *
 * @category Xodoa
 * @package Elastica
 * @author Nicolas Ruflin <spam@ruflin.com>
 */
class Video extends AbstractResultSet
{
    public function formatResults()
    {
        $results = array();

        $latestRecord = null;
        $timeZone = $this->getServiceLocator()->get('Publication')->getTimeZone();
        $timeZoneObj = new \DateTimeZone($timeZone);

        $now = new \DateTime();

        foreach ($this->getResults() as $result) {
            $outputArray = $this->getDataFromResult($result, $timeZoneObj);
            
            $outputArray += array(
                'embed_code'  => $result->source_id,
                'type'        => $result->getType(),
                'title'       => $result->headline,
                'description' => $result->body,
                'thumbnail'   => $result->thumbnail,
            );

            $results[$result->source_id] = $outputArray;
        }

        return $results;
    }
}
