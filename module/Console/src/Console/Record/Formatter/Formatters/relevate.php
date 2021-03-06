<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterTrait;
use DB\Datahub\Contact;
use Scoop\Database\Literal;
use Services\Meroveus\ContactService;

/**
 * Class Relevate
 */
class Relevate
{

    use FormatterTrait;

    /**
     * @param $line string
     *
     * @return Contact
     */
    public function format($line)
    {

        // char 0 to 10 is the id, strip off the first two digits and we have a meroveus id
        $currentMeroveusId = $this->cut_line_by_index_and_length($line, 2, 8);

        $contactService = new ContactService();

        /**
         * Not even our lord and savior knows why relevate decided to go with fixed width
         * columns and then call it a csv.  If you are reading this please pay your respects,
         * for I am sending this message from beyond the grave
         *          - justin robinson
         */
        $jobTitle = $this->cut_line_by_index_and_length($line, 325, 30, true);

        return new Contact(
            [
                'meroveusId'        => $currentMeroveusId,
                'relevateId'        => $currentMeroveusId,
                'isDuplicate'       => 0,
                'isCurrentEmployee' => 1,
                'firstName'         => $this->cut_line_by_index_and_length($line, 296, 11, true),
                'middleInitial'     => $this->cut_line_by_index_and_length($line, 307, 1, true),
                'lastName'          => $this->cut_line_by_index_and_length($line, 308, 14, true),
                'suffix'            => $this->cut_line_by_index_and_length($line, 322, 3, true),
                'honorific'         => '',
                'jobTitle'          => $jobTitle,
                'jobPositionId'     => $contactService->getJobPositionId($jobTitle, []),
                'email'             => '',
                'phone'             => '',
                'address1'          => '',
                'address2'          => null,
                'city'              => null,
                'state'             => null,
                'postalCode'        => null,
                'createdAt'         => new Literal('NOW()'),
                'updatedAt'         => new Literal('NOW()'),
            ]
        );
    }

    /**
     * @param $line   string
     * @param $from   int
     * @param $length int
     * @param $ucword bool
     *
     * @return string
     */
    private function cut_line_by_index_and_length($line, $from, $length, $ucword = false)
    {

        $substring = trim(substr($line, $from, $length));

        if ($ucword) {
            $substring = ucwords(strtolower($substring));
        }

        return $substring;
    }

}
