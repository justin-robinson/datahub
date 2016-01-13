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
 *
 * @method getHubId() return hub_id
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