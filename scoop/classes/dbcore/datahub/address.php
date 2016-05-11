<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Address
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/11
 * @property mixed $addressId
 * @property mixed $address1
 * @property mixed $address2
 * @property mixed $city
 * @property mixed $country
 * @property mixed $countryCode
 * @property mixed $latitude
 * @property mixed $longitude
 * @property mixed $sourceId
 * @property mixed $state
 * @property mixed $stateCode
 * @property mixed $zipCode
 * @property mixed $createdAt
 * @property mixed $updatedAt
 * @property mixed $deletedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Address
 */
class Address extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'address';
    const AUTO_INCREMENT_COLUMN = 'addressId';
    const PRIMARY_KEYS = 
        array (
          0 => 'addressId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'addressId',
          1 => 'createdAt',
          2 => 'updatedAt',
        );
    public static $dBColumnPropertiesArray = 
        array (
          'addressId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'address1' => 
          array (
          ),
          'address2' => 
          array (
          ),
          'city' => 
          array (
          ),
          'country' => 
          array (
          ),
          'countryCode' => 
          array (
          ),
          'latitude' => 
          array (
          ),
          'longitude' => 
          array (
          ),
          'sourceId' => 
          array (
          ),
          'state' => 
          array (
          ),
          'stateCode' => 
          array (
          ),
          'zipCode' => 
          array (
          ),
          'createdAt' => 
          array (
          ),
          'updatedAt' => 
          array (
          ),
          'deletedAt' => 
          array (
          ),
        );


    protected $dBValuesArray = 
        array (
          'addressId' => NULL,
          'address1' => NULL,
          'address2' => NULL,
          'city' => NULL,
          'country' => NULL,
          'countryCode' => NULL,
          'latitude' => NULL,
          'longitude' => NULL,
          'sourceId' => NULL,
          'state' => NULL,
          'stateCode' => NULL,
          'zipCode' => NULL,
          'createdAt' => NULL,
          'updatedAt' => NULL,
          'deletedAt' => NULL,
        );



}

?>