<?php
/**
 * User: daveb
 * Date: 12/11/15
 * Time: 1:47 PM
 */

namespace Hub\Model;

use \Entity\Model\Base;

class Journal extends Base
{
    /**
     * Doctrine entity class name
     *
     * @var string $entity_class      Doctrine entity class name
     * @access protected
     */
    protected $entity_class = 'Entity\Bizj\Journal';

    /**
     * Get all journal markets
     *
     * @access public
     * @return array
     */
    public function getMarkets()
    {
        $markets = [];
        foreach ($this->findAll() as $journal) {
            $markets[] = $journal->getMarket();
        }
        ksort($markets);

    }
}
