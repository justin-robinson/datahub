<?php

namespace Entity\Cms;

/**
 * ContentWorkspace
 */
class ContentWorkspace extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $content_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $user_name;

    /**
     * @var \Entity\Cms\Content
     */
    private $Content;


    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return ContentWorkspace
     */
    public function setContentId($contentId)
    {
        $this->content_id = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return integer
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return ContentWorkspace
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
     * Set userName
     *
     * @param string $userName
     *
     * @return ContentWorkspace
     */
    public function setUserName($userName)
    {
        $this->user_name = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set content
     *
     * @param \Entity\Cms\Content $content
     *
     * @return ContentWorkspace
     */
    public function setContent(\Entity\Cms\Content $content = null)
    {
        $this->Content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Entity\Cms\Content
     */
    public function getContent()
    {
        return $this->Content;
    }
}

