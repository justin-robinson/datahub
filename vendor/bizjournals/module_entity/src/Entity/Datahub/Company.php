<?php

namespace Entity\Datahub;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industry
 */
class Company extends \Entity\Entity\Base
{

    /** magic method docs
        @method  getHubId() { }                                 schema data get method
        @method  setHubId($hub_id) { }                          schema data set method
        @method  getRefineryId() { }                            schema data get method
        @method  setRefineryId($refinery_id) { }                schema data set method
        @method  getMeroveusId() { }                            schema data get method
        @method  setMeroveusId($meroveus_id) { }                schema data set method
        @method  getGenerateCode() { }                          schema data get method
        @method  setGenerateCode($generate_code) { }            schema data set method
        @method  getRecordSource() { }                          schema data get method
        @method  setRecordSource($record_source) { }            schema data set method
        @method  getCompanyName() { }                           schema data get method
        @method  setCompanyName($company_name) { }              schema data set method
        @method  getPublicTicker() { }                          schema data get method
        @method  setPublicTicker($public_ticker) { }            schema data set method
        @method  getTickerExchange() { }                        schema data get method
        @method  setTickerExchange($ticker_exchange) { }        schema data set method
        @method  getSourceModifiedAt() { }                      schema data get method
        @method  setSourceModifiedAt($source_modified_at) { }   schema data set method
        @method  getAddress1() { }                              schema data get method
        @method  setAddress1($address1) { }                     schema data set method
        @method  getAddress2() { }                              schema data get method
        @method  setAddress2($address2) { }                     schema data set method
        @method  getCity() { }                                  schema data get method
        @method  setCity($city) { }                             schema data set method
        @method  getState() { }                                 schema data get method
        @method  setState($state) { }                           schema data set method
        @method  getPostalCode() { }                            schema data get method
        @method  setPostalCode($postal_code) { }                schema data set method
        @method  getCountry() { }                               schema data get method
        @method  setCountry($country) { }                       schema data set method
        @method  getLatitude() { }                              schema data get method
        @method  setLatitude($latitude) { }                     schema data set method
        @method  getLongitude() { }                             schema data get method
        @method  setLongitude($longitude) { }                   schema data set method
        @method  getPhone() { }                                 schema data get method
        @method  setPhone($phone) { }                           schema data set method
        @method  getWebsite() { }                               schema data get method
        @method  setWebsite($website) { }                       schema data set method
        @method  getIsActive() { }                              schema data get method
        @method  setIsActive($is_active) { }                    schema data set method
        @method  getSicCode() { }                               schema data get method
        @method  setSicCode($sic_code) { }                      schema data set method
        @method  getEmployeeCount() { }                         schema data get method
        @method  setEmployeeCount($employee_count) { }          schema data set method
        @method  getCreatedAt() { }                             schema data get method
        @method  setCreatedAt($created_at) { }                  schema data set method
        @method  getUpdatedAt() { }                             schema data get method
        @method  setUpdatedAt($updated_at) { }                  schema data set method
        @method  getDeletedAt() { }                             schema data get method
        @method  setDeletedAt($deleted_at) { }                  schema data set method
    */
    /**
     * @var  integer
     */
    private $hub_id;
    /**
     * @var  integer
     */
    private $refinery_id;
    /**
     * @var  integer
     */
    private $meroveus_id;
    /**
     * @var  integer
     */
    private $generate_code;
    /**
     * @var  string
     */
    private $record_source;
    /**
     * @var  string
     */
    private $company_name;
    /**
     * @var  string
     */
    private $public_ticker;
    /**
     * @var  string
     */
    private $ticker_exchange;
    /**
     * @var  string
     */
    private $source_modified_at;
    /**
     * @var  integer
     */
    private $address1;
    /**
     * @var  string
     */
    private $address2;
    /**
     * @var  string
     */
    private $city;
    /**
     * @var  string
     */
    private $state;
    /**
     * @var  string
     */
    private $postal_code;
    /**
     * @var  string
     */
    private $country;
    /**
     * @var  string
     */
    private $latitude;
    /**
     * @var  string
     */
    private $longitude;
    /**
     * @var  string
     */
    private $phone;
    /**
     * @var  integer
     */
    private $website;
    /**
     * @var  string
     */
    private $is_active;
    /**
     * @var  integer
     */
    private $sic_code;
    /**
     * @var  integer
     */
    private $employee_count;
    /**
     * @var  integer
     */
    private $created_at;
    /**
     * @var  integer
     */
    private $updated_at;
    /**
     * @var  integer
     */
    private $deleted_at;
}
