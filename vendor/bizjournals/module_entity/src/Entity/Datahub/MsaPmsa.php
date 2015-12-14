<?php

namespace Entity\Datahub;

/**
 * MsaPmsa
 */
class MsaPmsa extends \Entity\Entity\Base
{
    /**
     * @var string
     */
    private $sa_code = 0;

    /**
     * @var string
     */
    private $sa_name;

    /**
     * @var string
     */
    private $sa_state;

    /**
     * @var boolean
     */
    private $is_combined = false;

    /**
     * @var string
     */
    private $parent_sa;

    /**
     * @var string
     */
    private $oneToMany;

    /**
     * @var string
     */
    private $manyToMany;


    /**
     * Set saCode
     *
     * @param string $saCode
     *
     * @return MsaPmsa
     */
    public function setSaCode($saCode)
    {
        $this->sa_code = $saCode;

        return $this;
    }

    /**
     * Get saCode
     *
     * @return string
     */
    public function getSaCode()
    {
        return $this->sa_code;
    }

    /**
     * Set saName
     *
     * @param string $saName
     *
     * @return MsaPmsa
     */
    public function setSaName($saName)
    {
        $this->sa_name = $saName;

        return $this;
    }

    /**
     * Get saName
     *
     * @return string
     */
    public function getSaName()
    {
        return $this->sa_name;
    }

    /**
     * Set saState
     *
     * @param string $saState
     *
     * @return MsaPmsa
     */
    public function setSaState($saState)
    {
        $this->sa_state = $saState;

        return $this;
    }

    /**
     * Get saState
     *
     * @return string
     */
    public function getSaState()
    {
        return $this->sa_state;
    }

    /**
     * Set isCombined
     *
     * @param boolean $isCombined
     *
     * @return MsaPmsa
     */
    public function setIsCombined($isCombined)
    {
        $this->is_combined = $isCombined;

        return $this;
    }

    /**
     * Get isCombined
     *
     * @return boolean
     */
    public function getIsCombined()
    {
        return $this->is_combined;
    }

    /**
     * Set parentSa
     *
     * @param string $parentSa
     *
     * @return MsaPmsa
     */
    public function setParentSa($parentSa)
    {
        $this->parent_sa = $parentSa;

        return $this;
    }

    /**
     * Get parentSa
     *
     * @return string
     */
    public function getParentSa()
    {
        return $this->parent_sa;
    }

    /**
     * Set oneToMany
     *
     * @param string $oneToMany
     *
     * @return MsaPmsa
     */
    public function setOneToMany($oneToMany)
    {
        $this->oneToMany = $oneToMany;

        return $this;
    }

    /**
     * Get oneToMany
     *
     * @return string
     */
    public function getOneToMany()
    {
        return $this->oneToMany;
    }

    /**
     * Set manyToMany
     *
     * @param string $manyToMany
     *
     * @return MsaPmsa
     */
    public function setManyToMany($manyToMany)
    {
        $this->manyToMany = $manyToMany;

        return $this;
    }

    /**
     * Get manyToMany
     *
     * @return string
     */
    public function getManyToMany()
    {
        return $this->manyToMany;
    }
}

