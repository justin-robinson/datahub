<?php

namespace Entity\Cms;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentDesk
 */
class ContentDesk extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $content_id;

    /**
     * @var integer
     */
    private $desk_id;

    /**
     * @var \Entity\Cms\Content
     */
    private $Content;

    /**
     * @var \Entity\Cms\Desk
     */
    private $Desk;


    /**
     * Set content_id
     *
     * @param integer $contentId
     * @return ContentDesk
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get content_id
     *
     * @return integer 
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * Set desk_id
     *
     * @param integer $deskId
     * @return ContentDesk
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
     * Set Content
     *
     * @param \Entity\Cms\Content $content
     * @return ContentDesk
     */
    public function setContent(\Entity\Cms\Content $content = null)
    {
        $this->Content = $content;

        return $this;
    }

    /**
     * Get Content
     *
     * @return \Entity\Cms\Content 
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Set Desk
     *
     * @param \Entity\Cms\Desk $desk
     * @return ContentDesk
     */
    public function setDesk(\Entity\Cms\Desk $desk = null)
    {
        $this->Desk = $desk;

        return $this;
    }

    /**
     * Get Desk
     *
     * @return \Entity\Cms\Desk 
     */
    public function getDesk()
    {
        return $this->Desk;
    }
}
