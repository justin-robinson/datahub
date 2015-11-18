<?php

namespace Entity\Medialibrary;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 */
class History extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $history_id;

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
    private $detail;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $username;

    /**
     * @var \DateTime
     */
    private $created_at;


    /**
     * Get history_id
     *
     * @return integer 
     */
    public function getHistoryId()
    {
        return $this->history_id;
    }

    /**
     * Set object_type
     *
     * @param string $objectType
     * @return History
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
     * @return History
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
     * Set detail
     *
     * @param string $detail
     * @return History
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return History
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return History
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return History
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
