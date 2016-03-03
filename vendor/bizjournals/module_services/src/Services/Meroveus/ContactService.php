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

        $return = null;
        $input  = strtoupper(ltrim($givenPosition));

        // if there is an exact match, return it and skip all the following
        if (array_key_exists($input, $jobIdDictionary)) {
            $return = $jobIdDictionary[$input];
        } else {
            $input = $this->normaTheTitle($input);
            if ($id = $this->isChiefOrVeep($input)) {
                $return = $id;
            } else {
                $return = $this->getHighestRankedTitle($input);
            }
        }

        return $return;
    }


    private function normaTheTitle($givenPosition)
    {
        /**
         * remove periods
         * remove dashes
         * strip after and including comma
         * uppercase
         * convert space to underscore
         */

        $norm = strtoupper($givenPosition);
        $norm = ltrim($norm);
        $norm = str_replace('/', ' ', $norm);
        $norm = str_replace('.', '', $norm);

        return $norm;
    }

    /**
     * is the contact a chief <something that we don't know about> officer?
     *
     * @param         $input
     *
     * @return int|null
     */
    private function isChiefOrVeep($input)
    {
        $return = null;

        if (strpos($input, 'CEO') !== false) {
            $return = 10;
        }
        if (strpos($input, 'CHIEF EXECUTIVE OFFICER') !== false) {
            $return = 10;
        }
        // are we a chief something unheard of?
        if (strpos($input, 'CHIEF') === 0 && strpos($input, 'OFFICER') && !strpos($input, 'EXECUTIVE')) {
            $return = 30;
        }
        if ((strpos($input, 'C') === 0 && strlen($input) === 3)) {
            $return = 30;
        }
        if (strpos($input, 'VICE PRESIDENT') !== false) {
            $return = 90;
        }
        if (strpos($input, 'VP') !== false) {
            $return = 90;
        }

        return $return;
    }

    /**
     * returns hignest ranked job_position_id that exists in a compound job position
     *
     * @param $compositeTitle
     *
     * @return mixed|null
     */
    private function getHighestRankedTitle($compositeTitle)
    {

        $return = null;
        // words that we currently care about and their job_position_id
        $wordRank = [
            'PRESIDENT' => 11,
            'OWNER'     => 22,
            'PARTNER'   => 50,
            'CHAIRMAN'  => 60,
            'EXECUTIVE' => 90,
            'DIRECTOR'  => 130,
            'MANAGER'   => 140,
        ];

        $compositeTitle = preg_split('/[^a-z0-9]/i', strtoupper($compositeTitle));

        $rankedWords = [];

        // build an array of existing words in the title and sort them according to rank asc
        foreach ($compositeTitle as $word) {
            if(strlen($word) === 3 && strpos($word, 'C') === 0){
                return 30;
            }
            if (array_key_exists($word, $wordRank)) {
                $rankedWords[$wordRank[$word]] = $word;
            }
        }
        // if we can't find one return null
        if (empty($rankedWords)) {
            return $return;
        } else {
            // sort the ranked words asc
            arsort($rankedWords);

            // key returns the first key of the array
            $return = key($rankedWords);
        }

        return $return;

    }

}



