<?php
/**
 * User: daveb
 * Date: 12/9/15
 * Time: 3:53 PM
 **/



namespace Hub\Model;


use \Entity\Model\Base;

/**
 * Class Company
 * @package Hub\Model
 * Documentation for magic methods - implemented in Core_Model_SchemaBase
 * @method integer getHubId() schema data get method
 * @method integer getRefineryId() schema data get method
 * @method integer getMeroveusId() schema data get method
 * @method integer setMeroveusId($id) schema data set method
 * @method string getGenerateCode() schema data get method
 * @method string getRecordSource() schema data get method
 * @method string getCompanyName() schema data get method
 * @method string getPublicTicker() schema data get method
 * @method string getTickerExchange() schema data get method
 * @method string getSourceModifiedAt() schema data get method
 * @method string getAddress1() schema data get method
 * @method string getAddress2() schema data get method
 * @method string getCity() schema data get method
 * @method string getState() schema data get method
 * @method string getPostalCode() schema data get method
 * @method string getCountry() schema data get method
 * @method float getLatitude() schema data get method
 * @method float getLongitude() schema data get method
 * @method string getPhone() schema data get method
 * @method string getWebsite() schema data get method
 * @method integer getIsActive() schema data get method
 * @method string getSicCode() schema data get method
 * @method integer getEmployeeCount() schema data get method
 * @method string getCreatedAt() schema data get method
 * @method string getUpdatedAt() schema data get method
 * @method string getDeletedAt() schema data get method
 * @method string getContacts() schema data get method
 *
 */
class Company extends Base
{
    /**
     * Doctrine entity class name
     *
     * @var string $entity_class Doctrine entity class name
     * @access protected
     */
    protected $entity_class = 'Entity\Datahub\Company';

    protected $metadata_class = 'Entity\Datahub\Metadata';

    protected $attribute_key = 'company';


}
