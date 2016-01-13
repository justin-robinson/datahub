<?php
/**
 * User: daveb
 * Date: 12/9/15
 * Time: 3:53 PM
 */

namespace Hub\Model;


use \Entity\Model\Base;

/**
 * Class Company
 * @package Hub\Model
 *
 *
 *
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
