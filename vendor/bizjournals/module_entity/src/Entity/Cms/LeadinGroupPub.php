<?php

namespace Entity\Cms;

/**
 * LeadinGroupPub
 */
class LeadinGroupPub extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $group_id;

    /**
     * @var integer
     */
    private $pub_id;

    /**
     * @var \Entity\Cms\LeadinGroup
     */
    private $LeadinGroup;

    /**
     * @var \Entity\Cms\Publication
     */
    private $Publication;


    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return LeadinGroupPub
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set pubId
     *
     * @param integer $pubId
     *
     * @return LeadinGroupPub
     */
    public function setPubId($pubId)
    {
        $this->pub_id = $pubId;

        return $this;
    }

    /**
     * Get pubId
     *
     * @return integer
     */
    public function getPubId()
    {
        return $this->pub_id;
    }

    /**
     * Set leadinGroup
     *
     * @param \Entity\Cms\LeadinGroup $leadinGroup
     *
     * @return LeadinGroupPub
     */
    public function setLeadinGroup(\Entity\Cms\LeadinGroup $leadinGroup = null)
    {
        $this->LeadinGroup = $leadinGroup;

        return $this;
    }

    /**
     * Get leadinGroup
     *
     * @return \Entity\Cms\LeadinGroup
     */
    public function getLeadinGroup()
    {
        return $this->LeadinGroup;
    }

    /**
     * Set publication
     *
     * @param \Entity\Cms\Publication $publication
     *
     * @return LeadinGroupPub
     */
    public function setPublication(\Entity\Cms\Publication $publication = null)
    {
        $this->Publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \Entity\Cms\Publication
     */
    public function getPublication()
    {
        return $this->Publication;
    }
}

