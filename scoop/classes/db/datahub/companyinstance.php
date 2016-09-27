<?php

namespace DB\Datahub;

use Heap\SortedUpdatedAt;
use LRUCache\LRUCache;
use Arrays\SortedInsert;
use Scoop\Database\Literal;
use Scoop\Database\Query\Buffer;
use Scoop\Database\Rows;

/**
 * Class CompanyInstance
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

    public static $useCache = true;

    /**
     * @var int
     */
    public static $instancesSaved = 0;

    /**
     * @var int[\DB\Datahub\CompanyInstanceProperty[]]
     */
    protected $propertiesArray;

    /**
     * @var SortedUpdatedAt
     */
    protected $propertiesSortedByUpdatedAt;

    /**
     * @var \SplDoublyLinkedList
     */
    protected $propertiesList;

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
     * @var rows
     */
    protected $lists;
    
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

        $this->propertiesArray = [];

        $this->propertiesSortedByUpdatedAt = new SortedUpdatedAt();

        $this->propertiesList = new \SplDoublyLinkedList();

        $this->contacts = new Rows();

        $this->channelIds = new Rows();

        if (is_null(self::$companyInstanceCache)) {
            self::$companyInstanceCache = new LRUCache (1000);
        }

//        $this->curl = curl_init();
//        curl_setopt($this->curl, CURLOPT_POST, true);
//        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Expect:']);
//        curl_setopt($this->curl, CURLOPT_HEADER, false);
//        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);

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

        if (!isset($this->propertiesArray[$sourceType->order]) || !is_array($this->propertiesArray[$sourceType->order])) {
            $this->propertiesArray[$sourceType->order] = [];
        }

        if (!isset($this->propertiesArray[$sourceType->order][$property->name]) || !is_array($this->propertiesArray[$sourceType->order][$property->name])) {
            $this->propertiesArray[$sourceType->order][$property->name] = [];
        }

        $this->propertiesArray[$sourceType->order][$property->name][$property->value] = $property;

        $this->propertiesSortedByUpdatedAt->insert($property);

        $this->propertiesList->push($property);
    }

    /**
     * @return bool
     */
    public function delete()
    {

        if (!$this->loadedFromDb) {
            return false;
        }

        $this->deletedAt = new Literal('NOW()');

        return parent::save();
    }

    /**
     * @param int    $limit
     * @param int    $offset
     * @param string $where
     * @param array  $queryParams
     * @param        bool fetch all records (including deleted)
     *
     * @return bool|int|Rows
     */
    public static function fetch($limit = 1000, $offset = 0, $where = '', array $queryParams = [], $allRecords = false)
    {

        if (!$allRecords) {
            $where = empty($where) ? 'deletedAt = ?' : "({$where}) AND deletedAt = ?";

            $queryParams[] = self::$dBColumnDefaultValuesArray['deletedAt'];
        }

        return parent::fetch($limit, $offset, $where, $queryParams);
    }

    /**
     * @param       $where
     * @param array $queryParams
     * @param int   $limit
     * @param int   $offset
     * @param bool  $allRecords
     *
     * @return bool|int|Rows
     */
    public static function  fetch_where($where, array $queryParams = [], $limit = 1000, $offset = 0, $allRecords = false)
    {

        return static::fetch($limit, $offset, $where, $queryParams, $allRecords);
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
            $properties = CompanyInstanceProperty::query(
                "SELECT
                  *
                FROM
                  companyInstanceProperty
                WHERE companyInstanceId = ?"
                . ($allRecords ? '' : " AND (deletedAt IS NULL OR deletedAt = '" . self::$dBColumnDefaultValuesArray['deletedAt'] . "')"),
                [$this->companyInstanceId]);

            $this->propertiesArray = [];

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
    public function fetch_state()
    {

        if (is_numeric($this->stateId)) {
            $this->state = State::fetch_by_id($this->stateId);
        }

        return $this->get_state();
    }
    
    /**
     * @return $mixed
     */

    public function fetch_lists()
    {
        $collection = CompanyInstanceTop25lists::fetch_where('companyInstanceId = ?', [$this->companyInstanceId]);
        
        $results = [];
        if($collection){
            foreach ($collection as $entry) {
                $list = Top25List::fetch_one_where('listId = ?', [$entry->listId]);
                if($list){
                    $results[] = $list;
                }
            }
        }
        $this->lists = $results;
        
        return $this->get_lists();
    }
    /**
     * @return mixed
     */
    public function fetch_channel_ids()
    {

        if (!empty($this->companyInstanceId)) {
            $channelIds = DhIndustryBizjChannelMap::query(
                "SELECT
                    cMap.*
                FROM
                    companyInstanceProperty cip
                    LEFT JOIN meroveusIndustry mi ON (mi.industry = cip.value)
                    LEFT JOIN dh_industry_bizj_channel_map cMap ON (cMap.dh_industry_id = mi.meroveusIndustryId)
                WHERE
                    cip.companyInstanceId = ?
                    AND cip.name = 'industry'
                GROUP BY
                    cMap.channel_id;",
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
    public function get_channel_ids()
    {

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
     * @return CompanyInstanceProperty|null
     */
    public function get_latest_property() {

        return $this->propertiesSortedByUpdatedAt->isEmpty() ? null : $this->propertiesSortedByUpdatedAt->top();
    }

    /**
     * @return \SplDoublyLinkedList
     */
    public function get_properties()
    {

        return $this->propertiesList;
    }
    
    public function get_lists()
    {
        return $this->lists;
    }
    /**
     * @return array|int
     */
    public function get_properties_array()
    {

        return $this->propertiesArray;
    }

    /**
     * @param $name
     *
     * @return CompanyInstanceProperty|null
     */
    public function get_property($name)
    {

        $sourceOrders = array_keys($this->propertiesArray);
        sort($sourceOrders);

        foreach ($sourceOrders as $sourceOrder) {
            if (!empty($this->propertiesArray[$sourceOrder][$name])) {
                reset($this->propertiesArray[$sourceOrder][$name]);

                return $this->propertiesArray[$sourceOrder][$name][key($this->propertiesArray[$sourceOrder][$name])];
            }
        }

        return null;
    }

    /**
     * @return State|null
     */
    public function get_state()
    {

        return $this->state;
    }

    /**
     * @return int
     */
    public function get_tier()
    {

        return $this->tier;
    }

    /**
     * @param array $dataArray
     */
    public function populate(array $dataArray)
    {

        parent::populate($dataArray);

        foreach ($this->propertiesArray as $i => $instanceOrder) {
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
     * @param bool $setTimestamps
     *
     * @return bool
     */
    public function save($setTimestamps = true)
    {

        // our cache key
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
        $companyInstanceCacheKey = strtolower(implode('-', $queryParams));
        // guilty until proven innocent
        $saved = false;

        if (!$this->is_loaded_from_database()) {

            // existing instance can be this model if the id is set, if not look in the cache
            $existingInstance = isset($this->companyInstanceId) ? $this : self::$companyInstanceCache->get($companyInstanceCacheKey);

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

        // merge existing instance into this one
        if ($existingInstance) {
            foreach ($existingInstance->to_array(false) as $column => $value) {
                if (empty($this->{$column})) {
                    $this->{$column} = $value;
                }
            }
            $this->loaded_from_database();
        }

        // set timestamps on the model before saving
        if ($setTimestamps) {
            if ($this->createdAt === self::$dBColumnDefaultValuesArray['createdAt']) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');
        }

        $this->instanceTierThyself();

        // save to db
        $saved = parent::save();

        if ($saved) {
            $this->save_contacts();
            $this->save_properties($setTimestamps);
            ++self::$instancesSaved;
            if ( self::$useCache ) {
                self::$companyInstanceCache->put($companyInstanceCacheKey, $this);
            }
        }

        return $saved;
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
     *
     * @param bool $setTimestamps
     */
    public function save_properties($setTimestamps = false)
    {

        if (empty($this->companyInstanceId)) {
            return;
        }

        // save properties to db with a query buffer
        $propertyBuffer = new Buffer(1000, CompanyInstanceProperty::class);
        $propertyBuffer->set_insert_ignore(true);

        foreach ($this->get_properties() as $property) {
            // link this property to this company instance
            $property->companyInstanceId = $this->companyInstanceId;

            $property->pre_save($setTimestamps);

            if (!empty($property->value)) {
                // buffer the property insertion
                $propertyBuffer->insert($property);
            }
        }

        // save buffered properties to db
        $propertyBuffer->flush();
    }

    /**
     * @param array $propertiesArray
     */
    public function set_properties(array $propertiesArray)
    {

        $this->propertiesArray = $propertiesArray;
    }

    /**
     * @param State $state
     */
    public function set_state(State $state)
    {

        $this->state = $state;
    }

    /**
     * @return array
     */
    public function sort_properties()
    {

        // the array of sorted properties
        $sortedProperties = [];

        // loop over property order
        foreach ($this->get_properties() as $property) {

            $property->fetch_source_type();

            // add if property isn't set
            if (!isset($sortedProperties[$property->name])) {
                $sortedProperties[$property->name] = $property;
            } else {

                // new property should be ignored if of a lower order
                if ($property->get_source_type()->order < $sortedProperties[$property->name]->get_source_type()->order) {
                    continue;
                }

                // add if property is newer than set one
                $newTime = new \DateTime($property->updatedAt);
                $existingTime = new \DateTime($sortedProperties[$property->name]->updatedAt);

                if ($newTime > $existingTime) {
                    $sortedProperties[$property->name] = $property;
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
            $array['properties'] = [];
            $array['contacts'] = [];

            foreach ($this->get_properties() as $property) {
                $array['properties'][] = $property->to_array();
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

        foreach ($this->get_properties() as $property) {
            $compare = (string)$property->updatedAt === 'NOW()' ? $now : new \DateTime($property->updatedAt);
            if ($compare > $updatedAt) {
                $updatedAt = $compare;
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
     * @return integer
     */
    private function countBasicFields()
    {

        // if there's no name, this is tier 7
        if (empty($this->name)) {
            return $basicPropCount = 0;
        }

        $basicPropCount = 0;

        foreach ($this->propertiesArray as $prop) {
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
     * @return int
     */
    private function countIdFields()
    {

        $idPropCount = 0;

        foreach ($this->propertiesArray as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->idFieldsDefinition)) {
                    $idPropCount++;
                }
            }
        }

        return $idPropCount;

    }


    /**
     * @return int
     */
    private function countEnhancedFields()
    {

        $count = 0;

        foreach ($this->propertiesArray as $prop) {
            foreach ($prop as $k => $v) {
                if (in_array($k, $this->enhancedFieldsDefinition)) {
                    $count++;
                }
            }
        }

        return $count;
    }


    /**
     * @return int
     */
    private function countGroupingFields()
    {

        $count = 0;

        foreach ($this->propertiesArray as $prop) {
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

        foreach ($this->get_properties() as $property) {
            if (!isset($sources[$property->sourceTypeId]) || $sources[$property->sourceTypeId] !== $property->sourceId) {
                $this->sources[$property->sourceTypeId] = $property->sourceId;
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
        $sources = $this->getSources();
        $this->contactCount = empty($this->contacts) ? 0 : $this->contacts->get_num_rows();
        $bestSourceType = $this->getBestSourceType();

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
