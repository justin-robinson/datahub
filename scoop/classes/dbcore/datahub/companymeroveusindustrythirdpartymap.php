<?php

namespace DBCore\Datahub;

use Scoop\Database\Model;

/**
 * Class CompanyMeroveusIndustryThirdPartyMap
 * @package DBCore\Datahub
 * @author jrobinson (robotically)
 * @date 2016/06/15
 * @property mixed $hub_id
 * @property mixed $meroveus_industry_id
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Datahub\CompanyMeroveusIndustryThirdPartyMap
 */
class CompanyMeroveusIndustryThirdPartyMap extends Model {

    const SCHEMA = 'datahub';
    const TABLE = 'company_meroveus_industry_third_party_map';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'hub_id',
          1 => 'meroveus_industry_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'hub_id',
          1 => 'meroveus_industry_id',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'hub_id' => 
          array (
            0 => 1,
          ),
          'meroveus_industry_id' => 
          array (
            0 => 1,
          ),
        );

    protected $dBValuesArray = 
        array (
          'hub_id' => NULL,
          'meroveus_industry_id' => NULL,
        );

}

?>