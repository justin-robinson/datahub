<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class Top25ListRow
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/15
 * @property mixed $row_id
 * @property mixed $list_id
 * @property mixed $rank
 * @property mixed $rank_value
 * @property mixed $prior_rank
 * @property mixed $object_type
 * @property mixed $object_id
 * @property mixed $company_name
 * @property mixed $address1
 * @property mixed $address2
 * @property mixed $city
 * @property mixed $state
 * @property mixed $zipcode
 * @property mixed $phone_number
 * @property mixed $public_email
 * @property mixed $website
 * @property mixed $recon_id
 * @property mixed $display_data
 * @property mixed $footnote_data
 * @property mixed $is_active
 * @property mixed $list_order
 * @property mixed $created_at
 * @property mixed $updated_at
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\Top25ListRow
 */
class Top25ListRow extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'top25_list_row';
    const AUTO_INCREMENT_COLUMN = 'row_id';
    const PRIMARY_KEYS = 
        array (
          0 => 'row_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'row_id',
          1 => 'list_id',
          2 => 'rank',
          3 => 'object_type',
          4 => 'object_id',
          5 => 'is_active',
          6 => 'list_order',
          7 => 'created_at',
          8 => 'updated_at',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'row_id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'list_id' => 
          array (
          ),
          'rank' => 
          array (
          ),
          'rank_value' => 
          array (
          ),
          'prior_rank' => 
          array (
          ),
          'object_type' => 
          array (
          ),
          'object_id' => 
          array (
          ),
          'company_name' => 
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
          'zipcode' => 
          array (
          ),
          'phone_number' => 
          array (
          ),
          'public_email' => 
          array (
          ),
          'website' => 
          array (
          ),
          'recon_id' => 
          array (
          ),
          'display_data' => 
          array (
          ),
          'footnote_data' => 
          array (
          ),
          'is_active' => 
          array (
          ),
          'list_order' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
        );

    protected $dBValuesArray = 
        array (
          'row_id' => NULL,
          'list_id' => NULL,
          'rank' => NULL,
          'rank_value' => NULL,
          'prior_rank' => NULL,
          'object_type' => NULL,
          'object_id' => NULL,
          'company_name' => NULL,
          'address1' => NULL,
          'address2' => NULL,
          'city' => NULL,
          'state' => NULL,
          'zipcode' => NULL,
          'phone_number' => NULL,
          'public_email' => NULL,
          'website' => NULL,
          'recon_id' => NULL,
          'display_data' => NULL,
          'footnote_data' => NULL,
          'is_active' => NULL,
          'list_order' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
        );

}

?>