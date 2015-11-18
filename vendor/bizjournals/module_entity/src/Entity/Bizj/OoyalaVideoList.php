<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * OoyalaVideoList
 */
class OoyalaVideoList extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $market_code;

    /**
     * @var string
     */
    private $embed_code;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $preview_image_url;

    /**
     * @var string
     */
    private $status = 'unknown';

    /**
     * @var string
     */
    private $metadata;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;


    /**
     * Set market_code
     *
     * @param string $marketCode
     * @return OoyalaVideoList
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get market_code
     *
     * @return string 
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set embed_code
     *
     * @param string $embedCode
     * @return OoyalaVideoList
     */
    public function setEmbedCode($embedCode)
    {
        $this->embed_code = $embedCode;

        return $this;
    }

    /**
     * Get embed_code
     *
     * @return string 
     */
    public function getEmbedCode()
    {
        return $this->embed_code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return OoyalaVideoList
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return OoyalaVideoList
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set preview_image_url
     *
     * @param string $previewImageUrl
     * @return OoyalaVideoList
     */
    public function setPreviewImageUrl($previewImageUrl)
    {
        $this->preview_image_url = $previewImageUrl;

        return $this;
    }

    /**
     * Get preview_image_url
     *
     * @return string 
     */
    public function getPreviewImageUrl()
    {
        return $this->preview_image_url;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return OoyalaVideoList
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set metadata
     *
     * @param string $metadata
     * @return OoyalaVideoList
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get metadata
     *
     * @return string 
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return OoyalaVideoList
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
     * @return OoyalaVideoList
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

    /**
     * Set deleted_at
     *
     * @param \DateTime $deletedAt
     * @return OoyalaVideoList
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}
