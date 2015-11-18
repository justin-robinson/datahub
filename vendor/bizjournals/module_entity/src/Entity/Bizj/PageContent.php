<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

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
     * Set page_id
     *
     * @param integer $pageId
     * @return PageContent
     */
    public function setPageId($pageId)
    {
        $this->page_id = $pageId;

        return $this;
    }

    /**
     * Get page_id
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
     * Set content_type
     *
     * @param string $contentType
     * @return PageContent
     */
    public function setContentType($contentType)
    {
        $this->content_type = $contentType;

        return $this;
    }

    /**
     * Get content_type
     *
     * @return string 
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Set content_html
     *
     * @param string $contentHtml
     * @return PageContent
     */
    public function setContentHtml($contentHtml)
    {
        $this->content_html = $contentHtml;

        return $this;
    }

    /**
     * Get content_html
     *
     * @return string 
     */
    public function getContentHtml()
    {
        return $this->content_html;
    }

    /**
     * Set word_count
     *
     * @param integer $wordCount
     * @return PageContent
     */
    public function setWordCount($wordCount)
    {
        $this->word_count = $wordCount;

        return $this;
    }

    /**
     * Get word_count
     *
     * @return integer 
     */
    public function getWordCount()
    {
        return $this->word_count;
    }

    /**
     * Set Page
     *
     * @param \Entity\Bizj\Page $page
     * @return PageContent
     */
    public function setPage(\Entity\Bizj\Page $page = null)
    {
        $this->Page = $page;

        return $this;
    }

    /**
     * Get Page
     *
     * @return \Entity\Bizj\Page 
     */
    public function getPage()
    {
        return $this->Page;
    }
}
