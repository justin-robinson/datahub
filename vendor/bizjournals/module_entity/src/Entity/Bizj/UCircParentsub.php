<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * UCircParentsub
 */
class UCircParentsub extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $parent_id;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set user_id
     *
     * @param integer $userId
     * @return UCircParentsub
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set parent_id
     *
     * @param integer $parentId
     * @return UCircParentsub
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parent_id
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
