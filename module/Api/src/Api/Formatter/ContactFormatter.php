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

        $uri = FormatterHelpers::get_http_protocol() . $_SERVER['HTTP_HOST'] . '/api/';

        $array = $property->to_array();

        $array['_links'] = [
            'self'      => [
                'href' => $uri . "contact/{$array['contactId']}",
            ],
            'instance' => [
                'href' => $uri . "instance/{$array['companyInstanceId']}",
            ],
        ];

        return $array;
    }
}
