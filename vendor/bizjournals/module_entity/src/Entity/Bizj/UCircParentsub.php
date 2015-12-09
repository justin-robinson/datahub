<?php

namespace Entity\Bizj;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return UCircParentsub
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return UCircParentsub
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;

        return $this;
    }

    /**
     * Get parentId
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

