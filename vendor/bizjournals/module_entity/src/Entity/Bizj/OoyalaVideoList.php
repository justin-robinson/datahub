<?php

namespace Entity\Bizj;

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
     * Set marketCode
     *
     * @param string $marketCode
     *
     * @return OoyalaVideoList
     */
    public function setMarketCode($marketCode)
    {
        $this->market_code = $marketCode;

        return $this;
    }

    /**
     * Get marketCode
     *
     * @return string
     */
    public function getMarketCode()
    {
        return $this->market_code;
    }

    /**
     * Set embedCode
     *
     * @param string $embedCode
     *
     * @return OoyalaVideoList
     */
    public function setEmbedCode($embedCode)
    {
        $this->embed_code = $embedCode;

        return $this;
    }

    /**
     * Get embedCode
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
     *
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
     *
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
     * Set previewImageUrl
     *
     * @param string $previewImageUrl
     *
     * @return OoyalaVideoList
     */
    public function setPreviewImageUrl($previewImageUrl)
    {
        $this->preview_image_url = $previewImageUrl;

        return $this;
    }

    /**
     * Get previewImageUrl
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
     *
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
     *
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return OoyalaVideoList
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return OoyalaVideoList
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return OoyalaVideoList
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}

