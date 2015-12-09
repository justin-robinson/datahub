<?php
/**
 * User: daveb
 * Date: 12/9/15
 * Time: 1:41 PM
 */

namespace Entity\Datahub;


class Contact extends \Entity\Entity\Base
{
    /** magic method docs
        @method getContactId() { }                              schema data get method
        @method setContactId($contact_id) { }                   schema data set method
        @method getHubId() { }                                  schema data get method
        @method setHubId($hub_id) { }                           schema data set method
        @method getMeroveusId() { }                             schema data get method
        @method setMeroveusId($meroveus_id) { }                 schema data set method
        @method getRelevateId() { }                             schema data get method
        @method setRelevateId($relevate_id) { }                 schema data set method
        @method getIsDuplicate() { }                            schema data get method
        @method setIsDuplicate($is_duplicate) { }               schema data set method
        @method getIsCurrentEmployee() { }                      schema data get method
        @method setIsCurrentEmployee($is_current_employee) { }  schema data set method
        @method getFirstName() { }                              schema data get method
        @method setFirstName($first_name) { }                   schema data set method
        @method getMiddleInitial() { }                          schema data get method
        @method setMiddleInitial($middle_initial) { }           schema data set method
        @method getLastName() { }                               schema data get method
        @method setLastName($last_name) { }                     schema data set method
        @method getSuffix() { }                                 schema data get method
        @method setSuffix($suffix) { }                          schema data set method
        @method getHonorific() { }                              schema data get method
        @method setHonorific($honorific) { }                    schema data set method
        @method getJobTitle() { }                               schema data get method
        @method setJobTitle($job_title) { }                     schema data set method
        @method getJobPositionId() { }                          schema data get method
        @method setJobPositionId($job_position_id) { }          schema data set method
        @method getEmail() { }                                  schema data get method
        @method setEmail($email) { }                            schema data set method
        @method getPhone() { }                                  schema data get method
        @method setPhone($phone) { }                            schema data set method
        @method getAddress1() { }                               schema data get method
        @method setAddress1($address1) { }                      schema data set method
        @method getAddress2() { }                               schema data get method
        @method setAddress2($address2) { }                      schema data set method
        @method getCity() { }                                   schema data get method
        @method setCity($city) { }                              schema data set method
        @method getState() { }                                  schema data get method
        @method setState($state) { }                            schema data set method
        @method getPostalCode() { }                             schema data get method
        @method setPostalCode($postal_code) { }                 schema data set method
        @method getCreatedAt() { }                              schema data get method
        @method setCreatedAt($created_at) { }                   schema data set method
        @method getUpdatedAt() { }                              schema data get method
        @method setUpdatedAt($updated_at) { }                   schema data set method
        @method getDeletedAt() { }                              schema data get method
        @method setDeletedAt($deleted_at) { }                   schema data set method
     */

    /**
     * @var integer
     */
    private $contact_id;
    /**
     * @var integer
     */
    private $hub_id;
    /**
     * @var integer
     */
    private $meroveus_id;
    /**
     * @var integer
     */
    private $relevate_id;
    /**
     * @var integer
     */
    private $is_duplicate;
    /**
     * @var integer
     */
    private $is_current_employee;
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $middle_initial;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $suffix;
    /**
     * @var string
     */
    private $honorific;
    /**
     * @var string
     */
    private $job_title;
    /**
     * @var int
     */
    private $job_position_id;
    /**
     * @var string
     */
    private $email;
    /**
     * @var integer
     */
    private $phone;
    /**
     * @var string
     */
    private $address1;
    /**
     * @var string
     */
    private $address2;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $state;
    /**
     * @var integer
     */
    private $postal_code;
    /**
     * @var string
     */
    private $created_at;
    /**
     * @var string
     */
    private $updated_at;
    /**
     * @var string
     */
    private $deleted_at;

}