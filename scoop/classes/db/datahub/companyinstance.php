<?php

namespace DB\Datahub;
use Scoop\Database\Query\Buffer;

/**
 * Class CompanyInstance
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/05
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstance extends \DBCore\Datahub\CompanyInstance {

    /**
     * @var int[\DB\Datahub\CompanyInstanceProperty[]]
     */
    protected $properties;

    /**
     * CompanyInstance constructor.
     *
     * @param array $dataArray
     */
    public function __construct ( array $dataArray ) {

        $this->properties = [];

        parent::__construct( $dataArray );
    }

    public function fetch_properties () {

        if ( empty($this->companyInstanceId) ) {
            return;
        }

        $properties = \DB\Datahub\CompanyInstanceProperty::query(
            "SELECT
               *
             FROM
               `datahub`.`companyInstanceProperty`
             WHERE
               companyInstanceId = ?
             ",
            [ $this->companyInstanceId ]
        );

        $this->properties = [];

        foreach ( $properties as $property ) {

            $this->add_property($property);
        }
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_properties () {

        return $this->properties;
    }

    /**
     * @param $name
     * @param $sourceTypeId
     *
     * @return null
     */
    public function get_property($name, $sourceTypeId) {

        if ( empty($this->properties[$sourceTypeId][$name]) ) {
            return null;
        }

        return $this->properties[$sourceTypeId][$name];
    }

    /**
     * @param CompanyInstanceProperty $property
     */
    public function add_property( CompanyInstanceProperty $property ) {

        if ( !isset($this->properties[$property->sourceTypeId]) || !is_array($this->properties[$property->sourceTypeId]) ) {
            $this->properties[$property->sourceTypeId] = [];
        }

        $this->properties[$property->sourceTypeId][$property->name] = $property;
    }

    public function save () {

        // set timestamps
        if ( empty($this->createdAt) ) {
            $this->set_literal('createdAt', 'NOW()');
        }
        $this->set_literal('updatedAt', 'NOW()');

        // save to db
        parent::save();

        // save properties to db with a query buffer
        $propertyBuffer = new Buffer(1000, get_class(new \DB\Datahub\CompanyInstanceProperty()));

        foreach ( $this->properties as $sourceProperties ) {
            foreach ( $sourceProperties as $property ) {

                // link this property to this company instance
                $property->companyInstanceId = $this->companyInstanceId;

                // buffer the property insertion
                $propertyBuffer->insert($property);
            }
        }

        // save buffered properties to db
        $propertyBuffer->flush();
    }

}

?>
