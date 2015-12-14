<?php

namespace Entity\Datahub;

/**
 * SicCode
 */
class SicCode extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $sic;

    /**
     * @var string
     */
    private $title;


    /**
     * Set sic
     *
     * @param string $sic
     *
     * @return SicCode
     */
    public function setSic($sic)
    {
        $this->sic = $sic;

        return $this;
    }

    /**
     * Get sic
     *
     * @return string
     */
    public function getSic()
    {
        return $this->sic;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return SicCode
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
}

