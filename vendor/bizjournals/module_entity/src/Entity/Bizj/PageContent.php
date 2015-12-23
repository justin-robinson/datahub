<?php

namespace Entity\Bizj;

/**
 * PageContent
 */
class PageContent extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $page_id;

    /**
     * @var integer
     */
    private $ord = 0;

    /**
     * @var string
     */
    private $content_type = 'paragraph';

    /**
     * @var string
     */
    private $content_html = '';

    /**
     * @var integer
     */
    private $word_count = 0;

    /**
     * @var \Entity\Bizj\Page
     */
    private $Page;


    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PageContent
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return PageContent
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set contentType
     *
     * @param string $contentType
     *
     * @return PageContent
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set contentHtml
     *
     * @param string $contentHtml
     *
     * @return PageContent
     */
    public function setContentHtml($contentHtml)
    {
        $this->content_html = $contentHtml;

        return $this;
    }

    /**
     * Get contentHtml
     *
     * @return string
     */
    public function getContentHtml()
    {
        return $this->content_html;
    }

    /**
     * Set wordCount
     *
     * @param integer $wordCount
     *
     * @return PageContent
     */
    public function setWordCount($wordCount)
    {
        $this->word_count = $wordCount;

        return $this;
    }

    /**
     * Get wordCount
     *
     * @return integer
     */
    public function getWordCount()
    {
        return $this->word_count;
    }

    /**
     * Set page
     *
     * @param \Entity\Bizj\Page $page
     *
     * @return PageContent
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Entity\Bizj\Page
     */
    public function getPage()
    {
        return $this->Page;
    }
}

