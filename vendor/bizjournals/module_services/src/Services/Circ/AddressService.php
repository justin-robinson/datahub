<?php
namespace Services\Circ;

use Services\AbstractService;

class AddressService extends AbstractService
{
    /**
     * Lookup the submitted address information
     * 
     * @access public
     * @param  array $addressData
     * @return array
     */
    public function lookup(array $addressData)
    {
        $filteredData = array_filter(
            $addressData,
            function ($key) { 
                return in_array($key, ['address1', 'address2', 'city', 'state', 'zip', 'country']);
            },
            ARRAY_FILTER_USE_KEY
        );
        return $this->getClient()->post('getaddress', $filteredData);
    }

    /**
     * Validate if the address is a good address
     *
     * @access public
     * @param  array $addressData
     * @return boolean
     */
    public function validate(array $addressData)
    {
        $response   = $this->lookup($addressData);
        $isValid    = !array_key_exists('ERROR', $response);
        if ($isValid) {
            $isValid = !(!empty($response['MATCH']) && $response['MATCH'] == 'STREET NAME INVALID');
        }
        return $isValid;
    }
}
