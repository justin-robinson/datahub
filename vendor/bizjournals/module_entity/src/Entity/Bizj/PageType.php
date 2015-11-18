<?php

namespace Entity\Bizj;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageType
 */
class PageType extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $type_id;

    /**
     * @var string
     */
    private $type_name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $use_template = true;

    /**
     * @var boolean
     */
    private $active = true;

    /**
     * @var boolean
     */
    private $in_search_results = true;


    /**
     * Get type_id
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set type_name
     *
     * @param string $typeName
     * @return PageType
     */
    public function setTypeName($typeName)
    {
        $this->type_name = $typeName;

        return $this;
    }

    /**
     * Get type_name
     *
     * @return string 
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return PageType
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
     * Set use_template
     *
     * @param boolean $useTemplate
     * @return PageType
     */
    public function setUseTemplate($useTemplate)
    {
        $this->use_template = $useTemplate;

        return $this;
    }

    /**
     * Get use_template
     *
     * @return boolean 
     */
    public function getUseTemplate()
    {
        return $this->use_template;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return PageType
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set in_search_results
     *
     * @param boolean $inSearchResults
     * @return PageType
     */
    public function setInSearchResults($inSearchResults)
    {
        $this->in_search_results = $inSearchResults;

        return $this;
    }

    /**
     * Get in_search_results
     *
     * @return boolean 
     */
    public function getInSearchResults()
    {
        return $this->in_search_results;
    }
}
