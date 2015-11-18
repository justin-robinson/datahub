<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElasticRecovery
 */
class ElasticRecovery extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $index_name;

    /**
     * @var string
     */
    private $type_name;

    /**
     * @var string
     */
    private $elasticid;

    /**
     * @var string
     */
    private $struct_data;

    /**
     * @var boolean
     */
    private $is_processed = false;

    /**
     * @var \DateTime
     */
    private $created_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return ElasticRecovery
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set index_name
     *
     * @param string $indexName
     * @return ElasticRecovery
     */
    public function setIndexName($indexName)
    {
        $this->index_name = $indexName;

        return $this;
    }

    /**
     * Get index_name
     *
     * @return string 
     */
    public function getIndexName()
    {
        return $this->index_name;
    }

    /**
     * Set type_name
     *
     * @param string $typeName
     * @return ElasticRecovery
     */
    public function setTypeName($typeName)
    {
        $this->type_name = $typeName;

        return $this;
    }

    /**
     * Get type_name
     *
     * @return string 
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Set elasticid
     *
     * @param string $elasticid
     * @return ElasticRecovery
     */
    public function setElasticid($elasticid)
    {
        $this->elasticid = $elasticid;

        return $this;
    }

    /**
     * Get elasticid
     *
     * @return string 
     */
    public function getElasticid()
    {
        return $this->elasticid;
    }

    /**
     * Set struct_data
     *
     * @param string $structData
     * @return ElasticRecovery
     */
    public function setStructData($structData)
    {
        $this->struct_data = $structData;

        return $this;
    }

    /**
     * Get struct_data
     *
     * @return string 
     */
    public function getStructData()
    {
        return $this->struct_data;
    }

    /**
     * Set is_processed
     *
     * @param boolean $isProcessed
     * @return ElasticRecovery
     */
    public function setIsProcessed($isProcessed)
    {
        $this->is_processed = $isProcessed;

        return $this;
    }

    /**
     * Get is_processed
     *
     * @return boolean 
     */
    public function getIsProcessed()
    {
        return $this->is_processed;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ElasticRecovery
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
