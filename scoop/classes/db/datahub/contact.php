<?php

namespace DB\Datahub;

use Scoop\Database\Literal;
/**
 * Class Contact
 * @package DB\Datahub
 * @author jrobinson (robotically)
 * @date 2016/05/05
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class Contact extends \DBCore\Datahub\Contact {

        /**
     * @var array
     * library of regex to assign numeric value to specifc keywords and substrings in job titles
     *
     */
    private $patternDictionary = [

        '/^.*(^|\s)(CHIEF\sEXECUTIVE\sOFFICER).*$/i'                 => 10,
        // the following matches any occurrence of "CEO" thats
        // not part of a word and can contain spaces or periods
        '/^.*(^|\s|\D|\W)(C\.?\s?E\.?\s?O\.?\s?)(\s|\D|\W)*.*$/i'    => 10,
        '/^.*(^|\s|\b)(PRESIDENT)(\s|\b|$).*$/i'                     => 11,
        '/^.*(^|\s|\b)(OWNER)(\s|\b|$).*$/i'                         => 22,
        '/^.*(^|\s|\b)(CHIEF\s*([^\s]*)\s*OFFICER).*$/i'             => 30,
        // the following matches any occurrence of a three letter group in the form of "C<whatever>O" that's
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

    public function __construct(array $dataArray = [])
    {
        parent::__construct($dataArray);
    }

    /**
     * populate a contact with data from a meroveus return
     * @param array $meroveusReturn
     *
     * @return $this
     */
    public function populateFromMeroveus(array $meroveusReturn){
        if (empty($meroveusReturn) || empty($meroveusReturn['DATA'])) {
            return false;
        }


        $contactData = [];
        // flatten the meroveus data return in order to avoid having a bad time
        foreach ($meroveusReturn['DATA'] as $val) {
            if (!empty($val['VAL'])) {
                $contactData[$val['KEY']] = $val['VAL'];
            }
        }

        $this->meroveusId        = empty($meroveusReturn['ID']) ? '' : $meroveusReturn['ID'];
//        $this->contactId         = empty($meroveusReturn['hub_id']) ? '' : $meroveusReturn['hub_id'];
        $this->relevateId        = null;
        $this->isDuplicate       = 0;
        $this->isCurrentEmployee = 1;
        $this->firstName         = empty($contactData['first-name_static']) ? null : $contactData['first-name_static'];
        $this->middleInitial     = empty($contactData['middle-name_static']) ? null : $contactData['middle-name_static'];
        $this->lastName          = empty($contactData['last-name_static']) ? '' : $contactData['last-name_static'];
        $this->suffix            = empty($contactData['suffix-name_static']) ? null : $contactData['suffix-name_static'];
        $this->honorific         = empty($contactData['prefix-name_static']) ? null : $contactData['prefix-name_static'];
        $this->phone             = empty($contactData['work-phone_static']) ? null : $contactData['work-phone_static'];
        // tack on the extension if present
        $this->phone .= empty($contactData['work-ext-phone_static']) ? '' : ' EXT: ' . $contactData['work-ext-phone_static'];

        if (empty($contactData['department-title_static'])) {
            $this->jobPositionId = null;
            $this->jobTitle      = null;
        } else {
            $this->jobPositionId = $this->getJobPositionId($contactData['department-title_static'], $this->patternDictionary);
            $this->jobTitle      = $contactData['department-title_static'];
        }

        $this->email      = empty($contactData['work-email_static']) ? null : $contactData['work-email_static'];
        $this->address1   = null;
        $this->address2   = null;
        $this->city       = null;
        $this->state      = null;
        $this->postalCode = null;
        $this->createdAt  = new Literal('NOW()');
        $this->updatedAt  = new Literal('NOW()');
        unset($meroveusReturn);

        return $this;
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

?>