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
    public function __construct ( array $dataArray = [] ) {

        $this->properties = [];

        parent::__construct( $dataArray );
    }

    /**
     * @param CompanyInstanceProperty $property
     */
    public function add_property( CompanyInstanceProperty $property ) {

        $sourceType = SourceType::fetch_one_where( 'sourceTypeId = ?', [$property->sourceTypeId] );

        if ( !$sourceType ) {
            return;
        }

        if ( !isset($this->properties[$sourceType->order]) || !is_array($this->properties[$sourceType->order]) ) {
            $this->properties[$sourceType->order] = [];
        }

        if ( !isset($this->properties[$sourceType->order][$property->name]) || !is_array( $this->properties[$sourceType->order][$property->name] )) {
            $this->properties[$sourceType->order][$property->name] = [];
        }

        $this->properties[$sourceType->order][$property->name][$property->value] = $property;
    }

    public function fetch_properties () {

        if ( empty($this->companyInstanceId) ) {
            return;
        }

        $properties = CompanyInstanceProperty::query(
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
     * @param $name
     * @param $id
     *
     * @return bool|int|\Scoop\Database\Rows|void
     */
    public static function fetch_by_source_name_and_id ( $name, $id ) {

        return self::query(
            "SELECT
                i.*
            FROM
                `datahub`.`sourceType` s
                LEFT JOIN `datahub`.`companyInstanceProperty` p USING (sourceTypeId)
                LEFT JOIN `datahub`.`companyInstance` i USING ( companyInstanceId )
            WHERE
                s.name LIKE ?
                AND p.sourceId = ?
            GROUP BY
                i.companyInstanceId",
            [$name, $id] );
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_properties () {

        return $this->properties;
    }

    /**
     * @param $name
     *
     * @return null
     */
    public function get_property($name) {

        $sourceOrders = array_keys($this->properties);
        sort($sourceOrders);

        foreach ( $sourceOrders as $sourceOrder ) {
            if ( !empty($this->properties[$sourceOrder][$name]) ) {
                reset($this->properties[$sourceOrder][$name]);
                return $this->properties[$sourceOrder][$name][key($this->properties[$sourceOrder][$name])];
            }
        }

        return null;
    }

    /**
     * @param bool $setTimestamps
     */
    public function save ( $setTimestamps = true ) {

        if ( $setTimestamps ) {

            // set timestamps
            if ( empty($this->createdAt) ) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');

        }

        // save to db
        parent::save();

        $this->save_properties();
    }

    public function save_properties () {
        // save properties to db with a query buffer
        $propertyBuffer = new Buffer(1000, get_class(new CompanyInstanceProperty()));
        $propertyBuffer->set_insert_ignore(true);

        foreach ( $this->properties as $sourceProperties ) {
            foreach ( $sourceProperties as $propertyName ) {
                foreach ( $propertyName as $property ) {
                    // link this property to this company instance
                    $property->companyInstanceId = $this->companyInstanceId;

                    $property->pre_save(false);

                    if ( !empty($property->value) ) {
                        // buffer the property insertion
                        $propertyBuffer->insert($property);
                    }
                }

            }
        }

        // save buffered properties to db
        $propertyBuffer->flush();
    }

    /**
     * @param array $properties
     */
    public function set_properties ( array $properties ) {

        $this->properties = $properties;
    }

}

?>
