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
 *
 * @package Services\Meroveus
 */
class ContactService extends AbstractService
{


    public function __construct()
    {


    }

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
     * @param array $jobIdDictionary
     * @return array
     */
    public function formatMeroveusContact(array $meroveusReturn, array $jobIdDictionary)
    {
        if (empty($meroveusReturn) || empty($meroveusReturn['DATA'])) {
            return false;
        }
        echo "line 51". ' in '."ContactService.php".PHP_EOL;
        die(var_dump( $meroveusReturn ));
        $contact     = [];
        $contactData = [];
        // flatten the meroveus data return in order to avoid having a bad time
        foreach ($meroveusReturn['DATA'] as $val) {
            if (!empty($val['VAL'])) {
                $contactData[$val['KEY']] = $val['VAL'];
            }
        }
        if(!empty($contactData['department-title_static'])){
            echo "line 61". ' in '."ContactService.php".PHP_EOL;
            die(var_dump( $contactData ));
        }
        $contact['meroveus_id']         = empty($meroveusReturn['ID']) ? '' : $meroveusReturn['ID'];
        $contact['hub_id']              = empty($meroveusReturn['hub_id']) ? '' : $meroveusReturn['hub_id'];
        $contact['relevate_id']         = null;
        $contact['is_duplicate']        = 0;
        $contact['is_current_employee'] = 1;
        $contact['first_name']          = empty($contactData['first-name_static']) ? null : $contactData['first-name_static'];
        $contact['middle_initial']      = empty($contactData['middle-name_static']) ? null : $contactData['middle-name_static'];
        $contact['last_name']           = empty($contactData['last-name_static']) ? null : $contactData['last-name_static'];
        $contact['suffix']              = empty($contactData['suffix-name_static']) ? null : $contactData['suffix-name_static'];
        $contact['honorific']           = empty($contactData['prefix-name_static']) ? null : $contactData['prefix-name_static'];
        $contact['phone']               = empty($contactData['work-phone_static']) ? null : $contactData['work-phone_static'];
        // tack on the extension if present
        $contact['phone'] .= empty($contactData['work-ext-phone_static']) ? '' : ' EXT: ' . $contactData['work-ext-phone_static'];

        if (empty($contactData['department-title_static'])) {
            $contact['job_position_id'] = 1001;
            $contact['job_title']       = null;
        } else {
            $contact['job_position_id'] = $this->getJobPositionId($contactData['department-title_static'], $jobIdDictionary) ?: 1001;
            $cont['job_title']          = $contactData['department-title_static'];
        }

        $contact['email']       = empty($contactData['work-email_static']) ? null : $contactData['work-email_static'];
        $contact['address1']    = null;
        $contact['address2']    = null;
        $contact['city']        = null;
        $contact['state']       = null;
        $contact['postal_code'] = null;
        $contact[':created_at'] = 'NOW()';
        $contact[':updated_at'] = 'NOW()';
        $contact[':deleted_at'] = null;
        unset($meroveusReturn);
        gc_collect_cycles();

        return $contact;

    }


    /**
     * https://bizjournals.atlassian.net/browse/DATA-76
     *
     * @param $givenPosition   string
     * @param $jobIdDictionary array
     *
     * @return int|null
     */
    private function getJobPositionId($givenPosition, array $jobIdDictionary)
    {
        $input = strtoupper($givenPosition);
//        return array_key_exists($input, $jobIdDictionary) ? $jobIdDictionary[$input] : null;

        if (array_key_exists($input, $jobIdDictionary)) {
            return $jobIdDictionary[$input];
        } else {
            return $this->isCheifOfTheUnknown($input);
        }
    }

    /**
     * is the contact a chief <something that we don't know about> officer?
     *
     * @param         $input
     *
     * @return int|null
     */
    private function isCheifOfTheUnknown($input)
    {
        // are we a chief something unheard of?
        if (strpos($input, 'CHIEF') === 0 && strpos($input, 'OFFICER')) {
            //                $db->execute();
            // @todo insert into db with job_position_id == 30
            return 30;
        }
        if ((strpos($input, 'C') === 0 && strlen($input) === 3)) {
            if (strpos($input, 'O') === 2) {
                // @todo insert into db with job_position_id == 30
                return 30;
            }
        }

        return null;
    }

}



