<?php

namespace Heap;

use DB\Datahub\CompanyInstanceProperty;

class SortedUpdatedAt extends \SplMaxHeap {

    public function compare($value1, $value2)
    {
        /**
         * @var $value1 CompanyInstanceProperty
         * @var $value2 CompanyInstanceProperty
         */
        if ( $value1->updatedAt === $value2->updatedAt ) {
            return 0;
        }

        return $value1->updatedAt < $value2->updatedAt ? -1 : 1;
    }

    public function insert($value)
    {
        if ( isset($value->updatedAt) ) {
            parent::insert($value);
        }
    }
}
