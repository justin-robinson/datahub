<?php
/**
 * User: daveb
 * Date: 1/12/16
 * Time: 3:50 PM
 */

namespace Services\Meroveus;

use Services\AbstractService;

/**
 * Class ContactService
 * @package Services\Meroveus
 */
class ContactService extends AbstractService
{

    /**
     * @param $refineryId
     */
    public function fetchAllByCompanyId($refineryId)
    {
    }

    /**
     * @param $contactId
     */
    public function get($contactId)
    {
    }

    /**
     * @param array $meroveusReturn
     */
    public function formatMeroveusReturn(array $meroveusReturn)
    {


        /**
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * you are here you are here you are here you are here
         * meroveus_id int(10) unsigned,
         * relevate_id int(10) unsigned,
         * is_duplicate tinyint(1) not null default '0',
         * is_current_employee tinyint(1) not null default '1',
         * first_name varchar(50),
         * middle_initial varchar(20),
         * last_name varchar(50) not null,
         * suffix varchar(20),
         * honorific varchar(20),
         * job_title varchar(255),
         * job_position_id int(10) unsigned,
         * email varchar(700),
         * phone varchar(70),
         * address1 varchar(150),
         * address2 varchar(150),
         * city varchar(100),
         * state varchar(70),
         * postal_code varchar(35),
         * created_at datetime not null,
         * updated_at datetime not null,
         * deleted_at datetime,
         * );
         */
        $contact = [];

        $contact['meroveus_id']         = !empty($meroveusReturn['ID']) ?: null;
        $contact['relevate_id']         = null;
        $contact['is_duplicate']        = 0;
        $contact['is_current_employee'] = 0;
        $contact['first_name']          = null;
        $contact['middle_initial']      = null;
        $contact['last_name']           = null;
        $contact['suffix']              = null;
        $contact['honorific']           = null;
        $contact['job_title']           = null;
        $contact['job_position_id']     = null;
        $contact['email']               = null;
        $contact['phone']               = null;
        $contact['address1']            = null;
        $contact['address2']            = null;
        $contact['city']                = null;
        $contact['state']               = null;
        $contact['postal_code']         = null;

        return $contact;

    }

}


