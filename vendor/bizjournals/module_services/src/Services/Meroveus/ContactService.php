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
    private $JobIdDictionary;

    public function __construct()
    {
//        ulitmatly built by referencing datahub.job_position
        $this->JobIdDictionary = [
            10 => [
                'CHIEF EXECUTIVE OFFICER',
                'CEO',
            ],
            11 => [
                'PRESIDENT',
            ],
            22 => [
                'OWNER',
            ],
            30 => [
                'CHIEF ? OFFICER',
                'C?0',
            ],
            60 => [
                'CHAIRMAN',
            ],
            50 => [
                'PARTNER',
            ],
            90 => [
                'HUMAN RESOURCES EXECUTIVE',
                'FINANCE EXECUTIVE',
                'SALES EXECUTIVE',
                'EXECUTIVE OFFICER',
                'OPERATIONS EXECUTIVE',
                'MANUFACTURING EXECUTIVE',
                'EXECUTIVE DIRECTOR',
                'EXECUTIVE VICE PRESIDENT',
                'MARKETING EXECUTIVE',
            ],
            130 => [
                'DIRECTOR',
            ],
            140 => [
                'GENERAL MANAGER',
                'OFFICE MANAGER',
                'MANAGER ',
            ],
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
     * @param $givenPosition
     *
     * @return int
     * map:
     * CEO                        10
     * President                  11
     * Principal                  20
     * Managing (any)             21
     * Owner                      22
     * C?O                        30
     * Founder                    40
     * Partner                    50
     * (any) Chairman (any)       60
     * (any) Executive (any)      90
     * EVP                        90
     * (Senior) Vice President/VP 100
     * AVP                        120
     * Director (any)             130
     * (any) Manager (any)        140
     * Other                      1000
     * No title                   1001
     */
    private function getJobPositionId($givenPosition)
    {
        return 123;
    }


}



