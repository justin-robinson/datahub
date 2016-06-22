<?php

namespace DB\Datahub;

use LRUCache\LRUCache;
use Scoop\Database\Literal;
use Scoop\Database\Model\Generic;
use Scoop\Database\Rows;

/**
 * Class Company
 *
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/05
 * @inheritdoc
 *          This file is only generated once
 *          Put your class specific code in here
 */
class Company extends \DBCore\Datahub\Company
{

    public static $companyCache;

    public static $companiesSaved = 0;

    /**
     * @var \Scoop\Database\Rows
     */
    protected $companyInstances;

    /**
     * abbreviations we will expand in the company name for normalization
     *
     * BREAKDOWN OF FIRST REGEX
     * /    : beginning of regex
     * \b   : matches a word boundary
     * corp : literally matches 'corp'
     * \b   : matches another word boundary ( including EOLs )
     * \.?  : optionally matches a literal period
     * /    : end of regex
     * i    : case insensitive match
     *
     * @var array
     */
    protected $companyNameNormalizationRegexStrings = [
        'Corporation'                            => [
            '/\bcorp\b\.?/i',
        ],
        'Incorporated'                           => [
            '/\binc\b\.?/i',
        ],
        'Limited Liability Parternship'          => [
            '/\bllp\b\.?/i',
        ],
        'Limited Partnership'                    => [
            '/\blp\b\.?/i',
        ],
        'Limited Liability Limited Partnership'  => [
            '/\bllp\b\.?/i',
        ],
        'Limited Liability Company'              => [
            '/\bllc\b\.?/i',
            '/\blc\b\.?/i',
            '/\bltd\b\.?/i',
            '/\bco\b\.?/i',
        ],
        'Professional Limited Liability Company' => [
            '/\bpllc\b\.?/i',
        ],
        'Professional Corporation'               => [
            '/\bpc\b\.?/i',
            '/\bp\.c\b\./i',
        ],
    ];



// page_crssref
//    refKey is name, rev value is refineryid

    /**
     * search array used on str_replace for name normalization
     *
     * @var string[]
     */
    protected static $companyNameNormalizationSearch;

    /**
     * replace array used on str_replace for name normalization
     *
     * @var string[]
     */
    protected static $companyNameNormalizationReplace;

    /**
     * Company constructor.
     *
     * @param array $dataArray
     */
    public function __construct(array $dataArray = [])
    {

        // build array of abbreviations to expand in the company name for normalization
        if (is_null(self::$companyNameNormalizationReplace) || is_null(self::$companyNameNormalizationSearch)) {
            foreach ($this->companyNameNormalizationRegexStrings as $replacement => &$finds) {
                foreach ($finds as $find) {
                    self::$companyNameNormalizationSearch[]  = $find;
                    self::$companyNameNormalizationReplace[] = $replacement;
                }
            }
        }

        if ( is_null(self::$companyCache) ) {
            self::$companyCache = new LRUCache( 1000 );
        }

        $this->companyInstances = new Rows();

        parent::__construct($dataArray);
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {

        // autoset the normalized name if we are setting the company name
        // also normalize the name value
        if ($name === 'name') {
            // expand company abbreviations and lowercase the name
            $value = $normalizedName = preg_replace(self::$companyNameNormalizationSearch,
                self::$companyNameNormalizationReplace, $value);

            // strip out anything that isn't a letter or number
            $normalizedName = preg_replace('/[^\w\d]/', '', $normalizedName);

            $this->normalizedName = strtolower($normalizedName);
        }

        parent::__set($name, $value);
    }

    /**
     * @param CompanyInstance $instance
     */
    public function add_company_instance(CompanyInstance $instance)
    {
        $this->companyInstances->add_row($instance);
    }

    /**
     * @return bool
     */
    public function delete () {

        if ( !$this->is_loaded_from_database() ) {
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
     *
     * @return bool|int|Rows
     */
    public static function fetch ( $limit = 1000, $offset = 0, $where = '', array $queryParams = [] ) {

        $where .= empty($where) ? '' : ' AND ';
        $where .= 'deletedAt IS NULL';

        return parent::fetch($limit, $offset, $where, $queryParams);
    }

    /**
     * @param $name
     * @param $id
     *
     * @return bool|int|\DB\Datahub\Company
     */
    public static function fetch_by_source_name_and_id($name, $id)
    {

        // using a LIKE clause on the name since we have source names like refinery:b2 :gen :bol etc
        // that all belong to refinery
        $companies = self::query(
            "SELECT
                c.*,
                p.sourceId
            FROM
                `datahub`.`sourceType` s
                LEFT JOIN `datahub`.`companyInstanceProperty` p USING (sourceTypeId)
                LEFT JOIN `datahub`.`companyInstance` i USING ( companyInstanceId )
                LEFT JOIN `datahub`.`company` c USING ( companyId )
            WHERE
                s.name LIKE ?
                AND p.sourceId = ?
                AND p.deletedAt IS NULL
                AND i.deletedAt IS NULL
                AND c.deletedAt IS NULL
            GROUP BY
                c.companyId",
            [$name, $id]);

        return $companies ? $companies->first() : $companies;

    }

    /**
     * return all records (including deleted)
     * @param bool $allRecords
     *
     * @return Rows
     */
    public function fetch_company_instances($allRecords = false)
    {

        if (!empty($this->companyId)) {
            $instances = CompanyInstance::fetch_where('companyId = ?', [$this->companyId], 1000, 0, $allRecords);
            $this->companyInstances = $instances ? $instances : new Rows();
        }

        return $this->get_company_instances();
    }

    /**
     * Return only deleted instances
     * 
     * @return Rows
     */
    public function fetch_deleted_company_instances()
    {

        if (!empty($this->companyId)) {
            $instances = CompanyInstance::fetch_where('companyId = ? AND deletedAt IS NOT NULL', [$this->companyId], 1000, 0);
            $this->companyInstances = $instances ? $instances : new Rows();
        }

        return $this->get_company_instances();
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_company_instances()
    {

        return $this->companyInstances;
    }

    /**
     * @param bool $setTimestamps
     *
     * @return bool
     */
    public function save($setTimestamps = true) {
        // this will renormalize the name
        $this->name = $this->name;
        // guilty until proven innocent
        $saved = false;
        // lookup company in cache by normalized name if it didn't come from the database
        if ( !$this->is_loaded_from_database() && self::$companyCache->exists($this->normalizedName)) {
            $this->populate(self::$companyCache->get( $this->normalizedName )->to_array(false));
            $this->loaded_from_database();

        } else {
            // actually save a new company :D
            // set timestamps on the model before saving
            if( $setTimestamps ) {
                if( $this->createdAt !== self::$dBColumnDefaultValuesArray['createdAt'] ) {
                    $this->set_literal( 'createdAt', 'NOW()' );
                }
                $this->set_literal( 'updatedAt', 'NOW()' );
            }
            // attempt the save
            try{
                $saved = parent::save();
                if ( $saved ) {
                    ++self::$companiesSaved;
                    // put company in cache for later
                    self::$companyCache->put( $this->normalizedName, $this );
                }
            } catch ( \Exception $e ) {
                // load existing company data into this model
                $existingCompany = self::fetch_one_where('normalizedName = ?', [$this->normalizedName]);
                if ( $existingCompany ) {
                    $this->populate($existingCompany->to_array(false));
                }
            }
        }
        $this->save_company_instances();
        return $saved;
    }

    public function save_company_instances () {
        // can't save instances if the company doesn't have an id
        if ( empty($this->companyId) ) {
            return;
        }
        // save each company instance
        foreach ($this->get_company_instances() as $companyInstance) {
            // link this instance to the company
            $companyInstance->companyId = $this->companyId;
            $companyInstance->save();
        }
    }

    /**
     * returns all data about a company with one query
     *
     * @param $companyId
     *
     * @return bool|Company
     */
    public static function fetch_company_and_instances($companyId) {

        /**
         * @var $company Company
         */
        $company = self::fetch_by_id($companyId);

        if ( $company === false ) {
            return false;
        }

        foreach ( $company->fetch_company_instances() as $instance ) {
            /**
             * @var $instance CompanyInstance
             */
            $instance->fetch_properties();
            $instance->fetch_contacts();
            $instance->fetch_state();
            $instance->fetch_channel_ids();
        }

        return $company;
    }

    /**
     * @param     $from
     * @param     $to
     * @param int $offset
     * @param int $limit
     *
     * @return Rows
     * @throws \Exception
     */
    public static function fetch_deleted_in_range( $from, $to, $offset = 0, $limit = 1000) {

        return self::query(
            "SELECT
              c.*
            FROM
              company c
              LEFT JOIN companyInstance ci USING (companyId)
              LEFT JOIN companyInstanceProperty cip USING (companyInstanceId)
            WHERE
              c.deletedAt BETWEEN ? and ?
              OR ci.deletedAt BETWEEN ? and ?
              OR cip.deletedAt BETWEEN ? and ?
            GROUP BY c.companyID
            LIMIT ?, ?",
            [$from, $to, $from, $to, $from, $to, $offset, $limit]
        );
    }

    /**
     * Get deleted count
     *
     * @param $from
     * @param $to
     *
     * @return bool|int|Rows
     */
    public static function fetch_deleted_in_range_count($from, $to) {

        $companiesDeleted = Generic::query(
            "SELECT
              c.companyId
            FROM
              company c
              LEFT JOIN companyInstance ci USING (companyId)
              LEFT JOIN companyInstanceProperty cip USING (companyInstanceId)
            WHERE
              c.deletedAt BETWEEN ? and ?
              OR ci.deletedAt BETWEEN ? and ?
              OR cip.deletedAt BETWEEN ? and ?
            GROUP BY c.companyID",
            [$from, $to, $from, $to, $from, $to]
        );

        return $companiesDeleted ? $companiesDeleted->get_num_rows() : 0;
    }

    /**
     * @param     $from
     * @param     $to
     * @param int $offset
     * @param int $limit
     *
     * @return Rows
     * @throws \Exception
     */
    public static function fetch_modified_in_range( $from, $to, $offset = 0, $limit = 1000) {

        return self::query(
            "SELECT
              c.*
            FROM
              company c
              LEFT JOIN companyInstance ci USING (companyId)
              LEFT JOIN companyInstanceProperty cip USING (companyInstanceId)
            WHERE
              c.updatedAt BETWEEN ? and ?
              OR ci.updatedAt BETWEEN ? and ?
              OR cip.updatedAt BETWEEN ? and ?
            GROUP BY c.companyID
            LIMIT ?, ?",
            [$from, $to, $from, $to, $from, $to, $offset, $limit]
            );
    }

    /**
     * @param $from
     * @param $to
     *
     * @return bool|int|Rows
     */
    public static function fetch_modified_in_range_count( $from, $to ) {

        $companiesModified = Generic::query(
            "SELECT
              c.companyId
            FROM
              company c
              LEFT JOIN companyInstance ci USING (companyId)
              LEFT JOIN companyInstanceProperty cip USING (companyInstanceId)
            WHERE
              c.updatedAt BETWEEN ? and ?
              OR ci.updatedAt BETWEEN ? and ?
              OR cip.updatedAt BETWEEN ? and ?
            GROUP BY c.companyID",
            [$from, $to, $from, $to, $from, $to]
        );

        return $companiesModified ? $companiesModified->get_num_rows() : 0;
    }

    /**
     * @param array $dataArray
     */
    public function populate ( array $dataArray ) {

        parent::populate( $dataArray );

        foreach ( $this->companyInstances as $index => $instance ) {
            if ( is_array($instance) ) {
                $this->companyInstances[$index] = new CompanyInstance($instance);
            }
        }
    }

    /**
     * @param bool $recursive
     *
     * @return array
     */
    public function to_array ( $recursive = true ) {

        $array = parent::to_array();

        if ( $recursive ) {
            $array['instances'] = [];
            foreach ( $this->get_company_instances() as $instance ) {
                $array['instances'][] = $instance->to_array();
            }
        }

        return $array;
    }

//    tier 1 definition:
//        Basic Company Fields:
//            name
//            address:
//                address1
//                address2
//                city
//                country
//                latitude
//                longitude
//                zipCode
//                state
//        Identifying Fields:
//            stockSymbol
//            stockExchange
//            phone
//            website
//        Contacts:
//            < 1 complete Contact (name and title)
//        Researched:
//            All the above data must be verified by humans ( source id on the properties )
//        Fresh:
//            Has been reviewed/updated in last year.
//        Site presence:
//            Appearance on 1 or more lists AND/OR Verified on 1 or more articles
//                If it has a meroveus Id, it's been on a list plus a look up in the page crossref table
//    Tier Two:
//        An expired tier 1, or a record that otherwise meets tier 1 with the following exceptions:
//        Has its data attributes provided by ACBJ partners (industry, or externally provided data attributes)
//
//    Tier Three
//        Missing one or more from basic fields
//        Has zero or more identifying fields.
//        Has zero or more from grouping fields.
//        Has zero or more from enhanced fields.
//        Has 1 or more contacts.
//
//    Tier Four
//        An otherwise tier one, two, or three record that has zero contacts.
//
//    Tier Five
//        Aged beyond the record-freshness target.
//
//    Tier Six
//        Records that haven’t been updated or reviewed in longer than 3 years.
//
//    Tier Seven
//        Stub record - doesn't meet basic fields, regardless of other attributes or contacts it ha

    /**
     * validates potential tier one instances based on data that we have in the system
     *
     * @param CompanyInstance $instance
     *
     * @return bool
     */
    public function tierOneValidate(CompanyInstance $instance)
    {

        $return = true;
        $props = $instance->get_properties();
        if (count($props[2]) < 10) {
            echo 'not enough tier1 fields' . PHP_EOL;
            $return = false;
        } else {

            echo 'meets min field counts' . PHP_EOL;
            /** @var CompanyInstanceProperty $value */
            foreach ($props[2] as $property) {
                foreach ($property as $value) {
                    if (!in_array($value->name, $this->tieringFields['enhanced'])) {
                        echo '  but has no enhanced fields' . PHP_EOL;
                        $return = false;
                        break(2);
                    }
                }
            }
        }
        return $return;
    }

    /**
     * @param CompanyInstance $instance
     */
    public function tierTwoValidate(CompanyInstance $instance){

    }
}

?>
