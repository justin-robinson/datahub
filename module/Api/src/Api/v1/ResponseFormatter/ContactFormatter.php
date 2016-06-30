<?php

namespace Api\v1\ResponseFormatter;

use DB\Datahub\Contact;

/**
 * Class ContactFormatter
 * @package Api\v1\ResponseFormatter
 */
class ContactFormatter {

    /**
     * @param Contact $property
     *
     * @return array
     */
    public static function format (Contact $property) {

        $uri = FormatterHelpers::get_http_protocol() . FormatterHelpers::get_server_variable('HTTP_HOST', 'hub') . '/api/v1/';

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
