<?php

namespace Entity\Medialibrary;

/**
 * NascarProductMedia
 */
class NascarProductMedia extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var string
     */
    private $image_type;

    /**
     * @var string
     */
    private $mime_type;

    /**
     * @var integer
     */
    private $file_size;

    /**
     * @var string
     */
    private $file_path;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return NascarProductMedia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return NascarProductMedia
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set imageType
     *
     * @param string $imageType
     *
     * @return NascarProductMedia
     */
    public function setImageType($imageType)
    {
        $this->image_type = $imageType;

        return $this;
    }

    /**
     * Get imageType
     *
     * @return string
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return NascarProductMedia
     */
    public function setMimeType($mimeType)
    {
        $this->mime_type = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return NascarProductMedia
     */
    public function setFileSize($fileSize)
    {
        $this->file_size = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * Set filePath
     *
     * @param string $filePath
     *
     * @return NascarProductMedia
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }
}

