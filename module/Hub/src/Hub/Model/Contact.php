<?php
/**
 * User: daveb
 * Date: 12/9/15
 * Time: 3:57 PM
 */

namespace Hub\Model;

use \Entity\Model\Base;


/**
 * Class Contact
 * @package Hub\Model
 * Documentation for magic methods - implemented in Core_Model_SchemaBase
 * @method integer   getContactId() schema data get method
 * @method integer   getHubId() schema data get method
 * @method integer   getMeroveusId() schema data get method
 * @method integer   getRelevateId() schema data get method
 * @method integer   getIsDuplicate() schema data get method
 * @method integer   getIsCurrentEmployee() schema data get method
 * @method string   getFirstName() schema data get method
 * @method string   getMiddleInitial() schema data get method
 * @method string   getLastName() schema data get method
 * @method string   getSuffix() schema data get method
 * @method string   getHonorific() schema data get method
 * @method string   getJobTitle() schema data get method
 * @method integer   getJobPositionId() schema data get method
 * @method string   getEmail() schema data get method
 * @method string   getPhone() schema data get method
 * @method string   getAddress1() schema data get method
 * @method string   getAddress2() schema data get method
 * @method string   getCity() schema data get method
 * @method string   getState() schema data get method
 * @method string   getPostalCode() schema data get method
 * @method string   getCreatedAt() schema data get method
 * @method string   getUpdatedAt() schema data get method
 * @method string   getELETEDAt() schema data get method
 */
class Contact extends Base
{
    /**
     * Doctrine entity class name
     *
     * @var string $entity_class      Doctrine entity class name
     * @access protected
     */
    protected $entity_class = 'Entity\Datahub\Contact';
}