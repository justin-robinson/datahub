<?php

namespace DB\Datahub;
use Scoop\Database\Literal;
use Scoop\Database\Rows;

/**
 * Class CompanyInstanceProperty
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/09
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class CompanyInstanceProperty extends \DBCore\Datahub\CompanyInstanceProperty
{

    /**
     * @var SourceType
     */
    protected $sourceType;

    /**
     * @return bool
     */
    public function delete()
    {

        if (!$this->get_loaded_from_database()) {
            return false;
        }

        $this->deletedAt = new Literal('NOW()');

        return $this->save(false);
    }

    /**
     * @param int    $limit
     * @param int    $offset
     * @param string $where
     * @param array  $queryParams
     *
     * @return bool|int|Rows
     */
    public static function fetch($limit = 1000, $offset = 0, $where = '', array $queryParams = [])
    {

        $where = empty($where) ? 'deletedAt = ?' : "({$where}) AND deletedAt = ?";

        $queryParams[] = self::$dBColumnDefaultValuesArray['deletedAt'];

        return parent::fetch($limit, $offset, $where, $queryParams);
    }

    /**
     * @return bool|Source|\Scoop\Database\Model
     */
    public function fetch_source_type()
    {

        if (!empty($this->sourceTypeId)) {
            $this->sourceType = SourceType::fetch_by_id($this->sourceTypeId);
        }

        return $this->get_source_type();
    }

    /**
     * @return Source
     */
    public function get_source_type()
    {

        return $this->sourceType;
    }

    /**
     * @param bool $setTimestamps
     *
     * @return bool
     */
    public function save($setTimestamps = true)
    {

        $this->pre_save($setTimestamps);

        return parent::save();
    }

    /**
     * @param bool $setTimestamps
     */
    public function pre_save($setTimestamps = true)
    {

        if ($setTimestamps) {
            // set timestamps
            if ($this->createdAt === self::$dBColumnDefaultValuesArray['createdAt']) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');
        }
    }

}

?>
