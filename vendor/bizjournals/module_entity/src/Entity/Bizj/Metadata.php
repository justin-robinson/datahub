<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metadata
 */
class Metadata extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $meta_id;

    /**
     * @var string
     */
    private $object_type;

    /**
     * @var integer
     */
    private $object_id;

    /**
     * @var string
     */
    private $meta_name;

    /**
     * @var string
     */
    private $meta_value;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * Get meta_id
     *
     * @return integer 
     */
    public function getMetaId()
    {
        return $this->meta_id;
    }

    /**
     * Set object_type
     *
     * @param string $objectType
     * @return Metadata
     */
    public function setObjectType($objectType)
    {
        $this->object_type = $objectType;

        return $this;
    }

    /**
     * Get object_type
     *
     * @return string 
     */
    public function getObjectType()
    {
        return $this->object_type;
    }

    /**
     * Set object_id
     *
     * @param integer $objectId
     * @return Metadata
     */
    public function setObjectId($objectId)
    {
        $this->object_id = $objectId;

        return $this;
    }

    /**
     * Get object_id
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set meta_name
     *
     * @param string $metaName
     * @return Metadata
     */
    public function setMetaName($metaName)
    {
        $this->meta_name = $metaName;

        return $this;
    }

    /**
     * Get meta_name
     *
     * @return string 
     */
    public function getMetaName()
    {
        return $this->meta_name;
    }

    /**
     * Set meta_value
     *
     * @param string $metaValue
     * @return Metadata
     */
    public function setMetaValue($metaValue)
    {
        $this->meta_value = $metaValue;

        return $this;
    }

    /**
     * Get meta_value
     *
     * @return string 
     */
    public function getMetaValue()
    {
        return $this->meta_value;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Metadata
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

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Metadata
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
