<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in EvRegistrationPerson
  */
namespace DBCore\Bizj;

use phpr\Database\Model;

class EvRegistrationPerson extends Model {

    const SCHEMA = 'bizj';
    const TABLE = 'ev_registration_person';
    const AUTO_INCREMENT_COLUMN = 'registration_person_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'registration_person_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'registration_person_id',
          1 => 'send_reminder',
        );

    public $registration_person_id = NULL;
    public $person_id = NULL;
    public $registration_id = NULL;
    public $c_time = NULL;
    public $send_reminder = NULL;
    public $DBColumnsArray = 
        array (
          'registration_person_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'person_id' => 
          array (
          ),
          'registration_id' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'send_reminder' => 
          array (
          ),
        );




}

?>