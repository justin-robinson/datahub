<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Contact
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/06
 * @property mixed $contactId
 * @property mixed $companyInstanceId
 * @property mixed $meroveusId
 * @property mixed $relevateId
 * @property mixed $isDuplicate
 * @property mixed $isCurrentEmployee
 * @property mixed $firstName
 * @property mixed $middleInitial
 * @property mixed $lastName
 * @property mixed $suffix
 * @property mixed $honorific
 * @property mixed $jobTitle
 * @property mixed $jobPositionId
 * @property mixed $email
 * @property mixed $phone
 * @property mixed $address1
 * @property mixed $address2
 * @property mixed $city
 * @property mixed $state
 * @property mixed $postalCode
 * @property mixed $createdAt
 * @property mixed $updatedAt
 * @property mixed $deletedAt
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Contact
 */
class Contact extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'contact';
    const AUTO_INCREMENT_COLUMN = 'contactId';
    const PRIMARY_KEYS = 
        array (
          0 => 'contactId',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'contactId',
          1 => 'isDuplicate',
          2 => 'isCurrentEmployee',
          3 => 'lastName',
          4 => 'createdAt',
          5 => 'updatedAt',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'contactId' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'companyInstanceId' => 
          array (
          ),
          'meroveusId' => 
          array (
          ),
          'relevateId' => 
          array (
          ),
          'isDuplicate' => 
          array (
          ),
          'isCurrentEmployee' => 
          array (
          ),
          'firstName' => 
          array (
          ),
          'middleInitial' => 
          array (
          ),
          'lastName' => 
          array (
          ),
          'suffix' => 
          array (
          ),
          'honorific' => 
          array (
          ),
          'jobTitle' => 
          array (
          ),
          'jobPositionId' => 
          array (
          ),
          'email' => 
          array (
          ),
          'phone' => 
          array (
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
          'state' => 
          array (
          ),
          'postalCode' => 
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
          'contactId' => NULL,
          'companyInstanceId' => NULL,
          'meroveusId' => NULL,
          'relevateId' => NULL,
          'isDuplicate' => NULL,
          'isCurrentEmployee' => NULL,
          'firstName' => NULL,
          'middleInitial' => NULL,
          'lastName' => NULL,
          'suffix' => NULL,
          'honorific' => NULL,
          'jobTitle' => NULL,
          'jobPositionId' => NULL,
          'email' => NULL,
          'phone' => NULL,
          'address1' => NULL,
          'address2' => NULL,
          'city' => NULL,
          'state' => NULL,
          'postalCode' => NULL,
          'createdAt' => NULL,
          'updatedAt' => NULL,
          'deletedAt' => NULL,
        );

}

?>