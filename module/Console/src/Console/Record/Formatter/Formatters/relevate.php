<?php

namespace Console\Record\Formatter\Formatters;

use Console\Record\Formatter\FormatterInterface;

/**
 * Class Relevate
 */
class Relevate implements FormatterInterface {

    /**
     * @param $line string
     * @return array
     */
    public function format ( $line ) {

        // char 0 to 10 is the id, strip off the first two digits and we have a meroveus id
        $currentMeroveusId = trim ( substr ( $line, 2, 8 ) );

        /**
         * Not even our lord and savior knows why relevate decided to go with fixed width
         * columns and then call it a csv.  If you are reading this please pay your respects,
         * for I am sending this message from beyond the grave
         *          - justin robinson
         */
        return [
            ':hub_id'              => '',
            ':meroveus_id'         => $currentMeroveusId,
            ':relevate_id'         => $currentMeroveusId,
            ':is_duplicate'        => 0,
            ':is_current_employee' => 1,
            ':first_name'          => ucwords ( strtolower ( trim ( substr ( $line, 296, 11 ) ) ) ),
            ':middle_initial'      => ucwords ( strtolower ( trim ( substr ( $line, 307, 1 ) ) ) ),
            ':last_name'           => ucwords ( strtolower ( trim ( substr ( $line, 308, 14 ) ) ) ),
            ':suffix'              => ucwords ( strtolower ( trim ( substr ( $line, 322, 3 ) ) ) ),
            ':honorific'           => '',
            ':job_title'           => ucwords ( strtolower ( trim ( substr ( $line, 325, 30 ) ) ) ),
            ':job_position_id'     => '',
            ':email'               => '',
            ':phone'               => '',
            ':address1'            => '',
            ':address2'            => null,
            ':city'                => null,
            ':state'               => null,
            ':postal_code'         => null
        ];
    }

}