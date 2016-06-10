<?php

namespace DB\Datahub;

use LRUCache\LRUCache;
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
     * @param $name
     * @param $id
     *
     * @return bool|int|\DB\Datahub\Company
     */
    public static function fetch_by_source_name_and_id($name, $id)
    {

        // using a LIKE clause on the name since we have source names like refinery:b2 :gen :bol etc
        // that all belong to refinery
        $companies = self::query("SELECT
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
            GROUP BY
                c.companyId", [$name, $id]);

        return $companies ? $companies->first() : $companies;

    }

    /**
     *
     */
    public function fetch_company_instances()
    {

        if (empty($this->companyId)) {
            return;
        }

        $this->companyInstances = CompanyInstance::fetch_where('companyId = ?', [$this->companyId]);
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
     */
    public function save($setTimestamps = true)
    {

        $companyKey = $this->normalizedName;

        // does this company exist in the cache?
        $existingCompany = self::$companyCache->get( $companyKey );

        // look up to db on cache miss
        if( !$existingCompany ) {
            $existingCompany = Company::fetch_one_where( 'normalizedName = ?', [ $this->normalizedName ] );
        }

        // save new company on cache miss and db lookup failure
        if( $existingCompany ) {

            $this->populate($existingCompany->to_array(false));
            $this->loaded_from_database();

        } else {

            if( $setTimestamps ) {

                // set timestamps
                if( empty($this->createdAt) ) {
                    $this->set_literal( 'createdAt', 'NOW()' );
                }
                $this->set_literal( 'updatedAt', 'NOW()' );

            }

            parent::save();

            ++self::$companiesSaved;

            // put company in cache for later
            self::$companyCache->put( $companyKey, $this );
        }

        $this->save_company_instances();

    }

    public function save_company_instances () {

        if ( empty($this->companyId) ) {
            return;
        }

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
    public static function fetch_company_and_instances($companyId)
    {
        Generic::connect();
        $mysqliResult = Generic::$connection->execute("SELECT
              c.*,
              ci.*,
              cip.*,
              cn.*
            FROM datahub.company c
              LEFT JOIN datahub.companyInstance ci USING (companyId)
              LEFT JOIN datahub.companyInstanceProperty cip USING (companyInstanceId)
              LEFT JOIN datahub.contact cn USING ( companyInstanceId )
            WHERE
              c.companyId = ?;", [$companyId]);

        $companies = self::create_rows_from_mysqli_result($mysqliResult);

        $mysqliResult->free();

        return $companies->first();
    }

    /**
     * @param     $from
     * @param     $to
     * @param int $offset
     *
     * @return Rows
     * @throws \Exception
     */
    public static function fetch_modified_in_range( $from, $to, $offset = 0) {

        Generic::connect();
        $mysqliResult = Generic::$connection->execute(
            "SELECT
              c.*,
              ci.*,
              cip.*,
              cn.*
            FROM
              (
                SELECT
                    *
                FROM
                    datahub.company c
                WHERE
                    c.updatedAt BETWEEN ? and ?
                LIMIT ?, 1000
              ) c
              LEFT JOIN datahub.companyInstance ci USING (companyId)
              LEFT JOIN datahub.companyInstanceProperty cip USING (companyInstanceId)
              LEFT JOIN datahub.contact cn USING ( companyInstanceId )
            WHERE
              ci.updatedAt BETWEEN ? and ?
              OR cip.updatedAt BETWEEN ? and ?;",
            [$from, $to, $offset, $from, $to, $from, $to]);

        $companies = self::create_rows_from_mysqli_result($mysqliResult);

        $mysqliResult->free();

        return $companies;
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

    /**
     * @param \mysqli_result $mysqliResult
     *
     * @return Rows
     */
    private static function create_rows_from_mysqli_result ( \mysqli_result $mysqliResult ) {

        $rows = new Rows();
        $prevCompanyId = null;
        $prevCompanyInstanceId = null;
        $prevCompanyInstancePropertyId = null;
        $prevContactId = null;
        $i = 0;

        // organize the fields where we can lookup by $fields['tableName']['columnName']
        // and get the index into the raw $rows array
        $fields = [];
        foreach ($mysqliResult->fetch_fields() as $fieldNumber => $field) {
            if (empty($fields[$field->orgtable])) {
                $fields[$field->orgtable] = [];
            }
            $fields[$field->orgtable][$field->orgname] = $fieldNumber;
        }

        while ($row = $mysqliResult->fetch_row()) {

            // the company instance id of this row
            $companyId = $row[$fields[Company::TABLE][Company::AUTO_INCREMENT_COLUMN]];

            // is this row a new company?
            if ( $companyId !== $prevCompanyId) {

                // add previous company to the rows collection
                if ( isset($company) ){
                    $rows->add_row($company);
                }

                // create a new company model
                $company = new self();
                foreach ($fields[Company::TABLE] as $columnName => $rowIndex) {
                    $company->$columnName = $row[$rowIndex];
                }

                // this will trigger a new company instance to be made ( just to be safe )
                unset($instance);
            }

            // the company instance id of this row
            $companyInstanceId = $row[$fields[CompanyInstance::TABLE][CompanyInstance::AUTO_INCREMENT_COLUMN]];

            // is this row a new instance?
            if ( $companyInstanceId !== $prevCompanyInstanceId) {

                // create the new instance model
                $instance = new CompanyInstance();

                // populate the model
                foreach ($fields[CompanyInstance::TABLE] as $columnName => $rowIndex) {
                    $instance->$columnName = $row[$rowIndex];
                }

                // add the instance to the company record
                $company->add_company_instance($instance);
            }

            // the company instance property id of this row
            $companyInstancePropertyId = $row[$fields[CompanyInstanceProperty::TABLE][CompanyInstanceProperty::AUTO_INCREMENT_COLUMN]];

            if ( $companyInstancePropertyId !== $prevCompanyInstancePropertyId ) {
                // all rows are properties so just create, populate, and add the the instance
                $property = new CompanyInstanceProperty();
                foreach ($fields[CompanyInstanceProperty::TABLE] as $columnName => $rowIndex) {
                    $property->$columnName = $row[$rowIndex];
                }
                $instance->add_property($property);
            }

            // the company instance property id of this row
            $contactId = $row[$fields[Contact::TABLE][Contact::AUTO_INCREMENT_COLUMN]];
            if ( $contactId !== $prevContactId ) {
                $contact = new Contact();
                foreach ( $fields[Contact::TABLE] as $columnName => $rowIndex ) {
                    $contact->$columnName = $row[$rowIndex];
                }
                $instance->add_contact($contact);
            }

            // need this for the next iteration
            $prevContactId = $contactId;
            $prevCompanyInstancePropertyId = $companyInstancePropertyId;
            $prevCompanyInstanceId = $companyInstanceId;
            $prevCompanyId = $companyId;

            ++$i;
        }

        // add last company to the rows collection
        if ( isset($company) ) {
            $rows->add_row($company);
        }

        return $rows;
    }
}

?>
