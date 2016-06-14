<?php

namespace Api\Formatter;

use DB\Datahub\Contact;

/**
 * Class ContactFormatter
 * @package Api\Formatter
 */
class ContactFormatter {

    /**
     * @param Contact $property
     *
     * @return array
     */
    public static function format (Contact $property) {

        $array = $property->to_array();

        $array['_links'] = [
            'self'      => [
                'href' => "/api/contact/{$array['contactId']}",
            ],
            'instance' => [
                'href' => "/api/instance/{$array['companyInstanceId']}",
            ],
        ];

        return $array;
    }
}
