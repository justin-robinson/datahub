<?php

namespace Services\Elastica;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

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
abstract class AbstractResultSet extends \Elastica\ResultSet implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

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
     * Retrieve serviceManager instance
     *
     * @return ServiceManager
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    abstract public function formatResults();

    public function getDataFromResult($result, $timezone)
    {
        $data = $result->getData();

        $datePublished = $result->date_published;
        if (!empty($datePublished)) {
            $datePublishedObj = new \DateTime($datePublished);
            $datePublishedObj->setTimezone($timezone);
            $data['date_published'] = $datePublishedObj;
        }

        $dateFirstPublished = $result->date_first_published;
        if (!empty($dateFirstPublished)) {
            $datePublishedObj = new \DateTime($dateFirstPublished);
            $datePublishedObj->setTimezone($timezone);
            $data['date_first_published'] = $datePublishedObj;
        }

        $dateRevised = $result->date_revised;
        if (!empty($dateRevised)) {
            $dateRevisedObj = new \DateTime($dateRevised);
            $dateRevisedObj->setTimezone($timezone);
            $data['revised'] = $dateRevisedObj;
        }

        $dateCreated = $result->date_created;
        if (!empty($dateCreated)) {
            $dateCreatedObj = new \DateTime($dateCreated);
            $dateCreatedObj->setTimezone($timezone);
            $data['created'] = $dateCreatedObj;
        }

        $dateStart = $result->date_start;
        if (!empty($dateStart)) {
            $dateStartObj = new \DateTime($dateStart);
            $dateStartObj->setTimezone($timezone);
            $data['date_start'] = $dateStartObj;
        }

        $dateEnd = $result->date_end;
        if (!empty($dateEnd)) {
            $dateEndObj = new \DateTime($dateEnd);
            $dateEndObj->setTimezone($timezone);
            $data['date_end'] = $dateEndObj;
        }

        return $data;
    }
}
