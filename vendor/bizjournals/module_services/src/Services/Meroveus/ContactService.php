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
    /**
     * @var array $JobIdDictionary
     *
     */
    private $jobIdDictionary;

    public function __construct()
    {
//        ulitmatly built by referencing datahub.job_position
        $this->jobIdDictionary = [
            'CHIEF EXECUTIVE OFFICER'      => 10,
            'CEO'                          => 10,
            'PRESIDENT'                    => 11,
            'OWNER'                        => 22,
            'CHIEF TECHNOLOGY OFFICER'     => 30,
            'CTO'                          => 30,
            'CHIEF FINANCIAL OFFICER'      => 30,
            'CFO'                          => 30,
            'CHIEF MARKETING OFFICER'      => 30,
            'CMO'                          => 30,
            'CHAIRMAN'                     => 60,
            'PARTNER'                      => 50,
            'HUMAN RESOURCES EXECUTIVE'    => 90,
            'FINANCE EXECUTIVE'            => 90,
            'SALES EXECUTIVE'              => 90,
            'EXECUTIVE OFFICER'            => 90,
            'OPERATIONS EXECUTIVE'         => 90,
            'MANUFACTURING EXECUTIVE'      => 90,
            'EXECUTIVE DIRECTOR'           => 90,
            'EXECUTIVE VICE PRESIDENT'     => 90,
            'MARKETING EXECUTIVE'          => 90,
            'DIRECTOR'                     => 130,
            'GENERAL MANAGER    '          => 140,
            'OFFICE MANAGER'               => 140,
            'MANAGER '                     => 140,
            'INFORMATION TECHNOLOGY'       => 1000,
            'BOARD MEMBER'                 => 1000,
            'PURCHASING'                   => 1000,
            'ADMINISTRATOR'                => 1000,
            'PUBLISHER/EDITOR'             => 1000,
            'CORP COMMUNICATIONS/PR'       => 1000,
            'LEGAL'                        => 1000,
            'BUSINESS DEVELOPMENT'         => 1000,
            'INTERNATIONAL RESPONSIBILITY' => 1000,
            'CONTROLLER'                   => 1000,
            'ENGINEERING/TECHNICAL'        => 1000,
            'PRINCIPAL'                    => 1000,
            'MEDICAL PROFESSIONAL'         => 1000,
            'GOVERNMENT PROFESSIONAL'      => 1000,
            'EDUCATOR'                     => 1000,
        ];
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
     *
     * @return array
     */
    public function formatMeroveusReturn(array $meroveusReturn)
    {

        if (empty($meroveusReturn) || empty($meroveusReturn['DATA'])) {
            return false;
        }

        $contact     = [];
        $contactData = [];
        // flatten the meroveus data return in order to avoid having a bad time
        foreach ($meroveusReturn['DATA'] as $val) {
            if (!empty($val['VAL'])) {
                $contactData[$val['KEY']] = $val['VAL'];
            }
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
        $contact['job_title']       = null;
        $contact['job_position_id'] = null;
        $contact['email']           = empty($contactData['work-email_static']) ? null : $contactData['work-email_static'];
        $contact['address1']        = null;
        $contact['address2']        = null;
        $contact['city']            = null;
        $contact['state']           = null;
        $contact['postal_code']     = null;
        $contact[':created_at']     = 'NOW()';
        $contact[':updated_at']     = 'NOW()';
        $contact[':deleted_at']     = null;
        unset($meroveusReturn);
        gc_collect_cycles();

        return $contact;

    }


    /**
     * @todo align contacts existing job position with our classifications in datahub.job_position
     * https://bizjournals.atlassian.net/browse/DATA-76
     *
     * @param $givenPosition string
     *
     * @return int
     */
    public function getJobPositionId($givenPosition)
    {
        $input = strtoupper($givenPosition);
//        $inputArray = str_word_count($input,1 );


        $key = array_key_exists($input, $this->jobIdDictionary) ? $this->jobIdDictionary[$input] : null;

        if ($key) {
            return $key;
        } else {
            // are we a chief something unheard of?
            if(strpos($input, 'CHIEF') === 0 && strpos($input, 'OFFICER')) {
                // insert into db with job_position_id == 30
                return 30;
            }
            if ( (strpos($input, 'C' ) === 0 && strlen($input) === 3) ) {
                // insert into db with job_position_id == 30
                return 30;
            }
        }
        return 1001;
    }


}



