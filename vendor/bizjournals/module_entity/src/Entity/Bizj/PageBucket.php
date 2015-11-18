<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageBucket
 */
class PageBucket extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $bucket;

    /**
     * @var string
     */
    private $krang_group;

    /**
     * @var string
     */
    private $label;

    /**
     * @var integer
     */
    private $special_cat_id;


    /**
     * Set bucket
     *
     * @param string $bucket
     * @return PageBucket
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * Get bucket
     *
     * @return string 
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * Set krang_group
     *
     * @param string $krangGroup
     * @return PageBucket
     */
    public function setKrangGroup($krangGroup)
    {
        $this->krang_group = $krangGroup;

        return $this;
    }

    /**
     * Get krang_group
     *
     * @return string 
     */
    public function getKrangGroup()
    {
        return $this->krang_group;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return PageBucket
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set special_cat_id
     *
     * @param integer $specialCatId
     * @return PageBucket
     */
    public function setSpecialCatId($specialCatId)
    {
        $this->special_cat_id = $specialCatId;

        return $this;
    }

    /**
     * Get special_cat_id
     *
     * @return integer 
     */
    public function getSpecialCatId()
    {
        return $this->special_cat_id;
    }
}
