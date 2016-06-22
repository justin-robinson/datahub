<?php

namespace DB\Datahub;

use LRUCache\LRUCache;
use Scoop\Database\Literal;
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
     * @var State|null
     */
    protected $state;

    /**
     * @var Rows
     */
    protected $channelIds;

    /**
     * @var int
     */
    protected $tier;

    /**
     * @var int
     */
    protected $freshness;

    /**
     * @var int
     */
    protected $basicCount;

    /**
     * @var int
     */
    protected $enhancedfieldsCount;

    /**
     * @var int
     */
    protected $idfieldsCount;

    /**
     * @var int
     */
    protected $storyCount;

    /**
     * @var int
     */
    protected $contactCount;

    /**
     * @var int
     */
    protected $extraFieldsCount;
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
     * @var resource
     */
    private $curl;
    /**
     * @var array
     */
    protected $groupingFieldsDefinition = ['industry', 'ownershipType'];

    /**
     * @var array
     */
    protected $sources = [];

    /**
     * CompanyInstance constructor.
     *
     * @param array $dataArray
     */
    public function __construct(array $dataArray = [])
    {

        $this->properties = [];

        $this->contacts = new Rows();

        $this->channelIds = new Rows();

        if (is_null(self::$companyInstanceCache)) {
            self::$companyInstanceCache = new LRUCache (1000);
        }

        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Expect:']);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);

        parent::__construct($dataArray);
    }

    /**
     *
     */
    public function __destruct()
    {
        curl_close($this->curl);
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
     * @return bool
     */
    public function delete()
    {

        if (!$this->loaded_from_database()) {
            return false;
        }

        $this->deletedAt = new Literal('NOW()');

        return $this->save(false);
    }

    /**
     * @param int    $limit
     * @param int    $offset
     * @param string $where
     * @param array  $queryParams
     * @param bool fetch all records (including deleted)
     *
     * @return bool|int|Rows
     */
    public static function fetch($limit = 1000, $offset = 0, $where = '', array $queryParams = [], $allRecords = false)
    {

        if (!$allRecords) {
            $where .= empty($where) ? '' : ' AND deletedAt IS NULL';
        }

        return parent::fetch($limit, $offset, $where, $queryParams);
    }

    /**
     * @return Rows
     */
    public function fetch_contacts()
    {

        if (!empty($this->companyInstanceId)) {
            $contacts = Contact::fetch_where('companyInstanceId = ?', [$this->companyInstanceId]);

            $this->contacts = $contacts ? $contacts : [];
        }

        return $this->get_contacts();

    }

    /**
     * @return Rows
     * @boolean get all records (including deleted)
     */
    public function fetch_properties($allRecords = false)
    {

        if (!empty($this->companyInstanceId)) {
            $properties = CompanyInstanceProperty::query("SELECT *
             FROM `datahub`.`companyInstanceProperty`
             WHERE companyInstanceId = ?" . (!$allRecords ? ' AND deletedAt IS NULL' : ''), [$this->companyInstanceId]);

            $this->properties = [];

            if ($properties) {
                foreach ($properties as $property) {

                    $this->add_property($property);
                }
            }

        }

        return $this->get_properties();
    }

    /**
     * @return State|null
     */
    public function fetch_state() {

        if ( is_numeric($this->stateId) ) {
            $this->state = State::fetch_by_id($this->stateId);
        }

        return $this->get_state();
    }

    /**
     * @return mixed
     */
    public function fetch_channel_ids() {

        if ( !empty($this->companyInstanceId) ) {
            $channelIds = DhIndustryBizjChannelMap::query(
                "SELECT
                    cMap.*
                FROM
                  companyInstance_meroveusIndustry cImI
                  LEFT JOIN dh_industry_bizj_channel_map cMap ON ( cImI.meroveusIndustryId = cMap.dh_industry_id )
                WHERE
                  cImI.companyInstanceId = ?",
                [$this->companyInstanceId]
            );

            $this->channelIds = $channelIds ? $channelIds : new Rows();
        }

        return $this->get_channel_ids();

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
                AND p.deletedAt IS NULL
                AND i.deletedAt IS NULL
            GROUP BY
                i.companyInstanceId", [$name, $id]);
    }

    /**
     * @return mixed
     */
    public function get_channel_ids () {

        return $this->channelIds;
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
     * @return State|null
     */
    public function get_state(){

        return $this->state;
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
     *
     * @return bool
     */
    public function save($setTimestamps = true)
    {

        // our cache key
        $zip                     = $this->get_property('zipCode');
        $zip                     = $zip ? $zip->value : '';
        $addr1                   = $this->get_property('address1');
        $addr1                   = $addr1 ? $addr1->value : '';
        $queryParams             = [
            $this->companyId,
            $this->name,
            $zip,
            $addr1,
        ];
        $companyInstanceCacheKey = strtolower(implode('-', $queryParams));

        if (!$this->is_loaded_from_database()) {

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
                      AND p.deletedAt IS NULL
                      AND i.deletedAt IS NULL
                      AND (
                        ( p.name = 'zipCode' AND p.value = ? )
                        OR
                        ( p.name = 'address1' AND p.value = ? )
                      )", $queryParams);

                if ($existingInstance) {
                    $existingInstance = $existingInstance->first();
                }
            }

        } else {
            $existingInstance = false;
        }

        // add properties to an existing instance
        if ($existingInstance) {

            // add properties to this instance
            $this->populate($existingInstance->to_array(false));

            $this->save_properties();

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

    /**
     * @param State $state
     */
    public function set_state ( State $state ) {

        $this->state = $state;
    }

    /**
     * @return array
     */
    public function sort_properties()
    {

        // the array of sorted properties
        $sortedProperties = [];

        // order the properties by source order
        ksort($this->properties);

        // loop over property order
        foreach ($this->properties as $order => $orderedPropertyGroup) {

            // property name
            foreach ($orderedPropertyGroup as $propertyName) {

                // property
                foreach ($propertyName as $property) {

                    $property->order = $order;

                    // add if property isn't set
                    if (!isset($sortedProperties[$property->name])) {
                        $sortedProperties[$property->name] = $property;
                    } else {

                        // new property should be ignored if of a higher order
                        if ($property->order > $sortedProperties[$property->name]->order) {
                            continue;
                        }

                        // add if property is newer than set one
                        $newTime      = new \DateTime($propertyName[$property->value]->updatedAt);
                        $existingTime = new \DateTime($sortedProperties[$property->name]->updatedAt);

                        if ($newTime > $existingTime) {
                            $sortedProperties[$property->name] = $property;
                        }
                    }
                }
            }
        }

        // convert all sorted properties to raw values
        foreach ($sortedProperties as &$property) {
            $property = $property->value;
        }

        return $sortedProperties;
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
            $array['contacts']   = [];

            foreach ($array['properties'] as &$orderedPropertyGroup) {
                foreach ($orderedPropertyGroup as &$propertyName) {
                    foreach ($propertyName as &$property) {
                        $property = $property->to_array();
                    }
                }
            }

            foreach ($this->get_contacts() as $contact) {
                $array['contacts'][] = $contact->to_array();
            }

            $array['state'] = $this->get_state();
        }

        return $array;
    }

    /**
     * @return int
     */
    private function calcFreshnessRating()
    {

        $now = new \DateTime('now');
        // make a datetime of the newest existing property
        $updatedAt = null;

        foreach ($this->properties as $field) {
            foreach ($field as $entry) {
                foreach ($entry as $prop) {
                    $compare = new \DateTime($prop->updatedAt);
                    if ($compare > $updatedAt) {
                        $updatedAt = $compare;
                    }
                }
            }
        }

        $days = $updatedAt->diff($now)->days;
        // determine ranges
        switch ($days) {
            case ($days > 1095):// greater than 3 years
                return 4;
                break;
            case ($days > 730): //greater than 2 years
                return 3;
                break;
            case ($days > 365): // greater than 1 year
                return 2;
                break;
            default:
                return 1; // less than 1 year
                break;
        }

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
     *
     * @return integer
     */
    private function countBasicFields()
    {
        // if there's no name, this is tier 7
        if (empty($this->name)) {
            return $basicPropCount = 0;
        }

        $basicPropCount = 0;

        foreach ($this->properties as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->basicFieldsDefinition)) {
                    $basicPropCount++;
                }
            }
        }

        return $basicPropCount;
    }

    /**
     * @return int
     */
    private function getBestSource()
    {
        $best = 8;
        foreach ($this->sources as $typeId => $sourceId) {
            if ($typeId < $best) {
                $best = $sourceId;
            }
        }

        return $best;
    }

    /**
     * @return int
     */
    private function getBestSourceType()
    {
        $best = 8;
        foreach ($this->sources as $typeId => $sourceId) {
            if ($typeId < $best) {
                $best = $typeId;
            }
        }

        return $best;
    }


    /**
     * I'm aware that I can generalize these count property fields
     */
    /**
     *
     * @return int
     */
    private function countIdFields()
    {
        $idPropCount = 0;

        foreach ($this->properties as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->idFieldsDefinition)) {
                    $idPropCount++;
                }
            }
        }

        return $idPropCount;

    }


    /**
     *
     * @return int
     */
    private function countEnhancedFields()
    {
        $count = 0;

        foreach ($this->properties as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->enhancedFieldsDefinition)) {
                    $count++;
                }
            }
        }

        return $count;
    }


    /**
     *
     * @return int
     */
    private function countGroupingFields()
    {
        $count = 0;

        foreach ($this->properties as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->groupingFieldsDefinition)) {
                    $count++;
                }
            }
        }

        return $count;
    }


    /**
     * @return array
     */
    private function getSources()
    {


        foreach ($this->properties as $property) {
            foreach ($property as $entry) {
                foreach ($entry as $data) {
                    if (!isset($sources[$data->sourceTypeId]) || $sources[$data->sourceTypeId] !== $data->sourceId) {
                        $this->sources[$data->sourceTypeId] = $data->sourceId;
                    }
                }
            }
        }

        return $this->sources;
    }

    /**
     * @return int
     */
    private function countExtraFields()
    {
        return $this->countEnhancedFields() + $this->countIdFields() + $this->countGroupingFields();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    private function countStories($id)
    {

        curl_setopt($this->curl, CURLOPT_URL,
            "http://solrdev.bizjournals.int:8080/solr/bizjournals/select?defType=edismax&q=company_id:$id&rows=0&wt=json");
        $result = curl_exec($this->curl);

        return json_decode($result, true)['response']['numFound'];
    }

    /**
     *
     * @param int $firstRun
     *
     * @return int
     */
    public function instanceTierThyself()
    {


        $this->tier = 7;

        // early return if there's no basic fields set
        $this->basicCount = $this->countBasicFields();
        if (($this->basicCount == 0)) {
            return $this->tier;
        }

        // fetch the basic metrics
        $this->freshness = $this->calcFreshnessRating();
        // early returns to not run the solr query
        // tier 5
        if ($this->freshness == 3) {
            return $this->tier = 5;
        }

        // tier 6
        if ($this->freshness >= 4) {
            return $this->tier = 6;
        }

        $this->extraFieldsCount = $this->countExtraFields();
        $sources                = $this->getSources();
        $this->contactCount     = empty($this->contacts) ? 0 : $this->contacts->get_num_rows();
        $bestSourceType         = $this->getBestSourceType();

        // find the "best" source (meroveus or datahub)
        // is there more than one source?
        if (count($sources) > 1) {
            $bestSourceId = $this->getBestSource();
        } else {
            $bestSourceId = array_pop($sources);
        }


        $this->storyCount = $this->countStories($bestSourceId);

        // tier one
        if (($this->freshness <= 1) // less than 1 year old
            && ($this->basicCount > 3) // has all basic fields (by count more Precision in the future)
            && ($this->extraFieldsCount > 0) // any of the extra fields
            && ($this->contactCount > 0) // a contact
            && ($bestSourceType <= 2 || ($this->storyCount > 0)) // either on a list or has a story in solr
        ) {
            $this->tier = 1;
        }

        // tier 2
        if ($this->tier !== 1) {
            if (($this->freshness == 2)
                && ($this->basicCount > 3)
                && ($this->extraFieldsCount > 0)
                && ($this->contactCount > 0)
                && ($bestSourceType > 2 || $this->storyCount > 0)
            ) {
                $this->tier = 2;
            }
        }


        // tier 3
        if ($this->tier !== 2) {
            if (($this->freshness == 2)
                && ($this->basicCount > 0)
                && ($this->storyCount > 0)
                && ($this->contactCount > 0)
                && $bestSourceType <= 2
                || $this->storyCount > 0
            ) {
                $this->tier = 3;
            }
        }

        // t4 last chances

        if ($this->tier <= 3
            && ($this->contactCount === 0)
        ) {
            $this->tier = 4;
        }

        // fresh leftovers with  basic fields intact  and a meroveusid means lists  = 4
        if ($this->tier === 7
            && $this->basicCount > 0
            && ($bestSourceType <= 2 || ($this->storyCount > 0))
        ) {
            $this->tier = 4;
        }

        return $this->tier;

    }

}

?>
