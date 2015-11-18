<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Desk
 */
class Desk extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $desk_id;

    /**
     * @var string
     */
    private $desk_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Content;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Content = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set desk_id
     *
     * @param integer $deskId
     * @return Desk
     */
    public function setDeskId($deskId)
    {
        $this->desk_id = $deskId;

        return $this;
    }

    /**
     * Get desk_id
     *
     * @return integer 
     */
    public function getDeskId()
    {
        return $this->desk_id;
    }

    /**
     * Set desk_name
     *
     * @param string $deskName
     * @return Desk
     */
    public function setDeskName($deskName)
    {
        $this->desk_name = $deskName;

        return $this;
    }

    /**
     * Get desk_name
     *
     * @return string 
     */
    public function getDeskName()
    {
        return $this->desk_name;
    }

    /**
     * Add Content
     *
     * @param \Entity\Cms\Content $content
     * @return Desk
     */
    public function addContent(\Entity\Cms\Content $content)
    {
        $this->Content[] = $content;

        return $this;
    }

    /**
     * Remove Content
     *
     * @param \Entity\Cms\Content $content
     */
    public function removeContent(\Entity\Cms\Content $content)
    {
        $this->Content->removeElement($content);
    }

    /**
     * Get Content
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContent()
    {
        return $this->Content;
    }
}
