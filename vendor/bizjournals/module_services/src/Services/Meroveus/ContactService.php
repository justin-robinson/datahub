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
     * @var array
     * library of regex to assign numeric value to specifc keywords and substrings in job titles
     *
     */
    private $patternDictionary = [

        '/^.*(^|\s)(CHIEF\sEXECUTIVE\sOFFICER).*$/i'                 => 10,
        // the following matches any occurrce of "CEO" thats
        // not part of a word and can contain spaces or periods
        '/^.*(^|\s|\D|\W)(C\.?\s?E\.?\s?O\.?\s?)(\s|\D|\W)*.*$/i'    => 10,
        '/^.*(^|\s|\b)(PRESIDENT)(\s|\b|$).*$/i'                     => 11,
        '/^.*(^|\s|\b)(OWNER)(\s|\b|$).*$/i'                         => 22,
        '/^.*(^|\s|\b)(CHIEF\s*([^\s]*)\s*OFFICER).*$/i'             => 30,
        // the following matches any occurrce of a three letter group in the form of "C<whatevet>O" thats
        // not part of a word and can contain spaces or periods
        '/^.*(^|\s|\b)(C\.?\s?[a-z]\.?\s?O\.?\s?)(\s|\b|$).*$/i'     => 30,
        '/^.*(^|\s|\b)(PARTNER)(\s|\b|$).*$/i'                       => 50,
        '/^.*(^|\s|\b)(CHAIRMAN)(\s|\b|$).*$/i'                      => 60,
        '/^.*(^|\s|\b)(FOUNDER)(\s|\b|$).*$/i'                       => 60,
        '/^.*(^|\s|\b)(EXECUTIVE)(\s|\b|$).*$/i'                     => 90,
        '/^.*(^|\s|\b)(VICE)(\s).*$/i'                               => 90,
        '/^.*(^|\s|\b)(EVP)(\s|\b).*$/i'                             => 90,
        '/^.*(^|\s|\D|\W)(E\.?\s?V\.?\s?P\.?\s?)(\s|\D|\W)*.*$/i'    => 90,
        '/^.*(^|\s|\b)(VP)(\s|\,|\b).*$/i'                           => 90,
        '/^.*(^|\s|\D|\W)(V\.?\s?P\.?\s?)(\s|\D|\W)*.*$/i'           => 90,
        '/^.*(^|\s|\b)(SVP)(\s|\,|\b).*$/i'                          => 90,
        '/^.*(^|\s|\D|\W)(S\.?\s?V\.?\s?P\.?\s?)(\s|\D|\W)*.*$/i'    => 90,
        '/^.*(^|\s|\b)(DIRECTOR)(\s|\b|$).*$/i'                      => 130,
        '/^.*(^|\s|\b)(MANAGER)(\s|\b|$).*$/i'                       => 140,
        '/^.*(^|\s|\b)(MANAGING)(\s|\b|$).*$/i'                      => 140,
        '/^.*(^|\s|\D|\W)(G\.?\s?M\.?\s?)(\s|\D|\W)*.*$/i'           => 140,
        '/^.*(^|\s|\b)(INFORMATION )(\s|\b|$).*$/i'                  => 1000,
        '/^.*(^|\s|\b)(BOARD\sMEMBER)(\s|\b|$).*$/i'                 => 1000,
        '/^.*(^|\s|\b)(PURCHASING)(\s|\b|$).*$/i'                    => 1000,
        '/^.*(^|\s|\b)(ADMINISTRATOR)(\s|\b|$).*$/i'                 => 1000,
        '/^.*(^|\s|\b)(PUBLISHER)(\s|\b|$).*$/i'                     => 1000,
        '/^.*(^|\s|\b)(EDITOR)(\s|\b|$).*$/i'                        => 1000,
        '/^.*(^|\s|\b)(COMMUNICATIONS)(\s|\b|$).*$/i'                => 1000,
        '/^.*(^|\s|\b)(PR)(\s|\b|$).*$/i'                            => 1000,
        '/^.*(^|\s|\b)(LEGAL)(\s|\b|$).*$/i'                         => 1000,
        '/^.*(^|\s|\b)(BUSINESS\sDEVELOPMENT)(\s|\b|$).*$/i'         => 1000,
        '/^.*(^|\s|\b)(INTERNATIONAL\sRESPONSIBILITY)(\s|\b|$).*$/i' => 1000,
        '/^.*(^|\s|\b)(CONTROLLER)(\s|\b|$).*$/i'                    => 1000,
        '/^.*(^|\s|\b)(ENGINEERING)(\s|\b|$).*$/i'                   => 1000,
        '/^.*(^|\s|\b)(TECHNICAL)(\s|\b|$).*$/i'                     => 1000,
        '/^.*(^|\s|\b)(PRINCIPAL)(\s|\b|$).*$/i'                     => 1000,
        '/^.*(^|\s|\b)(PROFESSIONAL)(\s|\b|$).*$/i'                  => 1000,
        '/^.*(^|\s|\b)(EDUCATOR)(\s|\b|$).*$/i'                      => 1000,
    ];

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
     *
     * @return array
     */
    public function formatMeroveusContact(array $meroveusReturn, array $jobIdDictionary)
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
        $contact['last_name']           = empty($contactData['last-name_static']) ? '' : $contactData['last-name_static'];
        $contact['suffix']              = empty($contactData['suffix-name_static']) ? null : $contactData['suffix-name_static'];
        $contact['honorific']           = empty($contactData['prefix-name_static']) ? null : $contactData['prefix-name_static'];
        $contact['phone']               = empty($contactData['work-phone_static']) ? null : $contactData['work-phone_static'];
        // tack on the extension if present
        $contact['phone'] .= empty($contactData['work-ext-phone_static']) ? '' : ' EXT: ' . $contactData['work-ext-phone_static'];

        if (empty($contactData['department-title_static'])) {
            $contact['job_position_id'] = null;
            $contact['job_title']       = null;
        } else {
            $contact['job_position_id'] = $this->getJobPositionId($contactData['department-title_static'],
                $jobIdDictionary) ?: 1001;
            $contact['job_title']       = $contactData['department-title_static'];
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
     * @param $givenPosition   string
     * @param $jobIdDictionary array
     *
     * @return int|null
     */
    public function getJobPositionId($givenPosition, array $jobIdDictionary)
    {
        $input = strtoupper(ltrim($givenPosition));

        if (array_key_exists($input, $jobIdDictionary)) {
            return $jobIdDictionary[$input];
        } else {
            foreach ($this->patternDictionary as $pattern => $id) {
                if (preg_match($pattern, $givenPosition)) {
                    return $id;
                }
            }
        }

        return 1001;
    }

}



