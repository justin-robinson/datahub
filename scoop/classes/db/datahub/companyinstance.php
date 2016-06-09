<?php

namespace DB\Datahub;

use LRUCache\LRUCache;
use Scoop\Database\Query\Buffer;
use Scoop\Database\Rows;

/**
 * Class CompanyInstance
 *
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/05
 * @inheritdoc
 *          This file is only generated once
 *          Put your class specific code in here
 */
class CompanyInstance extends \DBCore\Datahub\CompanyInstance
{

    /**
     * @var LRUCache
     */
    public static $companyInstanceCache;

    /**
     * @var int
     */
    public static $instancesSaved = 0;

    /**
     * @var int[\DB\Datahub\CompanyInstanceProperty[]]
     */
    protected $properties;

    /**
     * @var Rows
     */
    protected $contacts;

    /**
     * @var array
     */
    protected $basicFieldsDefinition = [
        'name',
        'address1',
        'city',
        'state',
        'zipCode',
    ];

    /**
     * @var array
     */
    protected $idFieldsDefinition = [
        'stockSymbol',
        'stockExchange',
        'phone',
        'website',
    ];

    /**
     * @var array
     */
    protected $enhancedFieldsDefinition = [
        'description',
        'logo',
        'revenue',
        'localEmployees',
        'totalEmployees',
        'minorityOwned',
        'womanOwned',
        'familyOwned',
        'yearFounded',
    ];

    /**
     * @var array
     */
    protected $groupingFieldsDefinition = ['industry', 'ownershipType'];


    /**
     * CompanyInstance constructor.
     *
     * @param array $dataArray
     */
    public function __construct(array $dataArray = [])
    {

        $this->properties = [];

        $this->contacts = new Rows();

        if (is_null(self::$companyInstanceCache)) {
            self::$companyInstanceCache = new LRUCache (1000);
        }

        parent::__construct($dataArray);
    }

    /**
     * @param Contact $contact
     */
    public function add_contact(Contact $contact)
    {

        $this->contacts->add_row($contact);
    }

    /**
     * @param CompanyInstanceProperty $property
     */
    public function add_property(CompanyInstanceProperty $property)
    {

        $sourceType = SourceType::fetch_one_where('sourceTypeId = ?', [$property->sourceTypeId]);

        if (!$sourceType) {
            return;
        }

        if (!isset($this->properties[$sourceType->order]) || !is_array($this->properties[$sourceType->order])) {
            $this->properties[$sourceType->order] = [];
        }

        if (!isset($this->properties[$sourceType->order][$property->name]) || !is_array($this->properties[$sourceType->order][$property->name])) {
            $this->properties[$sourceType->order][$property->name] = [];
        }

        $this->properties[$sourceType->order][$property->name][$property->value] = $property;
    }

    /**
     *
     */
    public function fetch_contacts()
    {

        if (empty($this->companyInstanceId)) {
            return;
        }

        $this->contacts = Contact::fetch_where('companyInstanceId = ?', [$this->companyInstanceId]);
    }

    /**
     *
     */
    public function fetch_properties()
    {

        if (empty($this->companyInstanceId)) {
            return;
        }

        $properties = CompanyInstanceProperty::query("SELECT
               *
             FROM
               `datahub`.`companyInstanceProperty`
             WHERE
               companyInstanceId = ?
             ", [$this->companyInstanceId]);

        $this->properties = [];

        foreach ($properties as $property) {

            $this->add_property($property);
        }
    }

    /**
     * @param $name
     * @param $id
     *
     * @return bool|int|\Scoop\Database\Rows|void
     */
    public static function fetch_by_source_name_and_id($name, $id)
    {

        return self::query("SELECT
                i.*
            FROM
                `datahub`.`sourceType` s
                LEFT JOIN `datahub`.`companyInstanceProperty` p USING (sourceTypeId)
                LEFT JOIN `datahub`.`companyInstance` i USING ( companyInstanceId )
            WHERE
                s.name LIKE ?
                AND p.sourceId = ?
            GROUP BY
                i.companyInstanceId", [$name, $id]);
    }

    /**
     * @return Rows
     */
    public function get_contacts()
    {

        return $this->contacts;
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_properties()
    {

        return $this->properties;
    }

    /**
     * @param array $dataArray
     */
    public function populate(array $dataArray)
    {

        parent::populate($dataArray);

        foreach ($this->properties as $i => $instanceOrder) {
            foreach ($instanceOrder as $j => $propertyName) {
                foreach ($propertyName as $k => $property) {
                    if (is_array($property)) {
                        $this->add_property(new CompanyInstanceProperty($property));
                    }
                }
            }
        }
    }

    /**
     * @param $name
     *
     * @return null
     */
    public function get_property($name)
    {

        $sourceOrders = array_keys($this->properties);
        sort($sourceOrders);

        foreach ($sourceOrders as $sourceOrder) {
            if (!empty($this->properties[$sourceOrder][$name])) {
                reset($this->properties[$sourceOrder][$name]);

                return $this->properties[$sourceOrder][$name][key($this->properties[$sourceOrder][$name])];
            }
        }

        return null;
    }

    /**
     * @param bool $setTimestamps
     */
    public function save($setTimestamps = true)
    {

        $zip = $this->get_property('zipCode');
        $zip = $zip ? $zip->value : '';
        $addr1 = $this->get_property('address1');
        $addr1 = $addr1 ? $addr1->value : '';
        $queryParams = [
            $this->companyId,
            $this->name,
            $zip,
            $addr1,
        ];
        $companyInstanceCacheKey = strtolower(implode( '-', $queryParams ));

        // check cache for this instance
        $existingInstance = self::$companyInstanceCache->get($companyInstanceCacheKey);

        // if the instance has an id, then it exists
        if (isset($this->companyInstanceId)) {
            $existingInstance = $this;
        }

        // no cache hit or id? look it up in the db
        if (!$existingInstance) {
            $existingInstance = CompanyInstance::query("SELECT
                      i.*
                     FROM
                      `datahub`.`companyInstance` i
                      LEFT JOIN `datahub`.`companyInstanceProperty` p USING ( companyInstanceId )
                     WHERE
                      i.companyId = ?
                      AND i.name = ?
                      AND (
                        ( p.name = 'zipCode' AND p.value = ? )
                        OR
                        ( p.name = 'address1' AND p.value = ? )
                      )", $queryParams);

            if ($existingInstance) {
                $existingInstance = $existingInstance->first();
            }
        }

        // add properties to an existing instance
        if ($existingInstance) {

            // add properties to this instance
            $existingInstance->set_properties($this->get_properties());

            $existingInstance->save_properties();

        } else {

            if ($setTimestamps) {

                // set timestamps
                if (empty($this->createdAt)) {
                    $this->set_literal('createdAt', 'NOW()');
                }
                $this->set_literal('updatedAt', 'NOW()');

            }

            // save to db
            parent::save();

            $this->save_contacts();
            $this->save_properties();

            ++self::$instancesSaved;

            self::$companyInstanceCache->put($companyInstanceCacheKey, $this);
        }

    }

    /**
     * Save all contacts to the db
     */
    public function save_contacts()
    {

        // buffer all inserts
        $contactBuffer = new Buffer(1000, Contact::class);
        $contactBuffer->set_insert_ignore(true);

        foreach ($this->contacts as $contact) {
            $contact->companyInstanceId = $this->companyInstanceId;

            $contactBuffer->insert($contact);
        }

        $contactBuffer->flush();
    }

    /**
     * Save all properties to the db
     */
    public function save_properties()
    {

        if (empty($this->companyInstanceId)) {
            return;
        }

        // save properties to db with a query buffer
        $propertyBuffer = new Buffer(1000, CompanyInstanceProperty::class);
        $propertyBuffer->set_insert_ignore(true);

        foreach ($this->properties as $sourceProperties) {
            foreach ($sourceProperties as $propertyName) {
                foreach ($propertyName as $property) {
                    // link this property to this company instance
                    $property->companyInstanceId = $this->companyInstanceId;

                    $property->pre_save(false);

                    if (!empty($property->value)) {
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
    public function set_properties(array $properties)
    {

        $this->properties = $properties;
    }

    public function sort_properties () {

        $properties = [];

        // order the properties by source order
        ksort($this->properties);

        foreach ( $this->properties as $orderedPropertyGroup ) {
            foreach ( $orderedPropertyGroup as $propertyName ) {
                foreach ( $propertyName as $property ) {
                    if ( !isset($properties[$property->name]) ) {
                        $properties[$property->name] = $property->value;
                    }
                }
            }
        }

        return $properties;
    }

    /**
     * @param bool $recursive
     *
     * @return array
     */
    public function to_array($recursive = true)
    {

        $array = parent::to_array();

        if ($recursive) {
            $array['properties'] = $this->get_properties();
            $array['contacts'] = $this->get_contacts() ? $this->get_contacts() : [];

            foreach ($array['properties'] as &$orderedPropertyGroup) {
                foreach ($orderedPropertyGroup as &$propertyName) {
                    foreach ($propertyName as &$property) {
                        $property = $property->to_array();
                    }
                }
            }
        }

        return $array;
    }

    /**
     * @param        $instance
     * @param bolean $firstRun
     */
    public function tierInstance($firstRun = 1)
    {



    }


    /**
     * @param $property
     *
     * @return int
     */
    private function calcFreshnessRating($property)
    {

        switch ($property['updatedAt']) {
            case ($property['updatedAt'] >= 3):
                $return = 4;
                break;
            case (($property['updatedAt'] > 1) && ($property['updatedAt'] <= 3)):
                $return = 3;
                break;
            case (($property['updatedAt'] > 1) && ($property['updatedAt'] <= 2)):
                $return = 2;
                break;
            case (($property['updatedAt'] <= 1)):
                $return = 1;
                break;
            default:
                $return = 0;
                break;
        }

        return $return;
    }

    /**
     * @param bool $firstRun
     *
     * @return bool
     */
    private function hasStory($firstRun = false)
    {
        $return = false;

        if ($firstRun) {
            // solr query
            $return = true;
        } else {
            if ($this->getStories()) {
                $return = true;
            }
        }

        // query solr

        return $return;
    }


    /**
     * @param $instance
     *
     * @return inty
     */
    private function countBasicFields()
    {
        $basicPropCount = 0;
        foreach ($this->properties as $prop) {
            foreach ($prop as $k =>$v){
                if (in_array($k, $this->basicFieldsDefinition)) {
                    $basicPropCount++;
                }}
        }

        return $basicPropCount;
    }


    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasIdFields()
    {
        $return = false;
        // if any of the vals in the matching fields array are present in the properties,
        // return true

        return $return;
    }


    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasEnhancedFields()
    {
        $return = false;
        // if any of the vals in the matching fields array are present in the properties,
        // return true

        return $return;
    }


    /**
     * @param $instance
     *
     * @return bool
     */
    private function hasGroupingFields()
    {
        $return = false;
        // if any of the vals in the matching fields array are present in the properties,
        // return true

        return $return;
    }


    /**
     *
     */
    private function getStories()
    {

    }

    public function instanceTierThyself($firstRun = 1)
    {
        $tier = 7;

        $basicCount = $this->countBasicFields();

        if (($basicCount === 0) ) {
            return $tier;
        }

        foreach ($this->properties as $property) {

            $freshness = $this->calcFreshnessRating($property);
            // everyone starts at the bottom
            switch ($freshness) {

                case(4):// older than 3 years : t6 
                    $tier = 6;
                    break;
                case(3):// older than 2 but less than 3 years: t5 
                    $tier = 5;
                    break;
                case(2)://older than 1 but less than 2 years old t3 - t2
                    if ($tier3 = true /* however this works returns true or whatever */) {
                        if ($this->contacts) {

                            $tier = 3;
                        } else {
                            $tier = 4;
                        }
                    } else {
                        if ($this->contacts) {
                            $tier = 4;
                        } else {
                            $tier = 2;
                        }
                    }
                    break;
                case(1):// t1, t4, 0r t7

                    if ($this->hasEnhancedFields() && $this->hasIdFields() && $this->hasGroupingFields() && $this->contacts) {

                        if ($this->contacts) {

                            $tier = 1; // finF***ingLy
                        } else {
                            $tier = 4;
                        }

                    }

                    break;
                case(0):// t7 no properties!
                    $tier = 7;
                    break;
            }

            return $tier;
        }


    }

}

?>
