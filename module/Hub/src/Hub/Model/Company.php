<?php
/**
 * User: daveb
 * Date: 12/9/15
 * Time: 3:53 PM
 */

namespace Hub\Model;

use \Entity\Model\Base;

class Company extends Base
{
    /**
     * Doctrine entity class name
     *
     * @var string $entity_class      Doctrine entity class name
     * @access protected
     */
    protected $entity_class = 'Entity\Datahub\Company';

}
