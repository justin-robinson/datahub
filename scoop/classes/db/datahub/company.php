<?php

namespace DB\Datahub;

/**
 * Class Company
 *
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/05
 * @inheritdoc
 *          This file is only generated once
 *          Put your class specific code in here
 */
class Company extends \DBCore\Datahub\Company
{

    /**
     * @var \Scoop\Database\Rows
     */
    protected $companyInstances;

    /**
     * Company constructor.
     *
     * @param array $dataArray
     */
    public function __construct(array $dataArray = [])
    {

        $this->companyInstances = new \Scoop\Database\Rows();

        parent::__construct($dataArray);
    }

    /**
     * @param CompanyInstance $instance
     */
    public function add_company_instance(CompanyInstance $instance)
    {

        $this->companyInstances->add_row($instance);
    }

    /**
     * @param $name
     * @param $id
     *
     * @return bool|int|\DB\Datahub\Company
     */
    public static function fetch_by_source_name_and_id($name, $id)
    {

        // using a LIKE clause on the name since we have source names like refinery:b2 :gen :bol etc
        // that all belong to refinery
        $companies = self::query("SELECT
                c.*,
                p.sourceId
            FROM
                `datahub`.`sourceType` s
                LEFT JOIN `datahub`.`companyInstanceProperty` p USING (sourceTypeId)
                LEFT JOIN `datahub`.`companyInstance` i USING ( companyInstanceId )
                LEFT JOIN `datahub`.`company` c USING ( companyId )
            WHERE
                s.name LIKE ?
                AND p.sourceId = ?
            GROUP BY
                c.companyId", [$name, $id]);

        return $companies ? $companies->first() : $companies;

    }

    public function fetch_company_instances()
    {

        if (empty($this->companyId)) {
            return;
        }

        $this->companyInstances = CompanyInstance::fetch_where('companyId = ?', [$this->companyId]);
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_company_instances()
    {

        return $this->companyInstances;
    }

    /**
     * @param bool $setTimestamps
     */
    public function save($setTimestamps = true)
    {

        if ($setTimestamps) {

            // set timestamps
            if (empty($this->createdAt)) {
                $this->set_literal('createdAt', 'NOW()');
            }
            $this->set_literal('updatedAt', 'NOW()');

        }

        parent::save();

        foreach ($this->get_company_instances() as $companyInstance) {
            $companyInstance->companyId = $this->companyId;
            $companyInstance->save();
        }
    }

    /**
     * returns all data about a company with one query
     *
     * @param $companyId
     */
    public static function fetchCompanyAndInstances($companyId)
    {
        $rows           = \Scoop\Database\Model\Generic::query("
            SELECT *
            FROM datahub.company c
              JOIN datahub.companyInstance ci USING (companyId)
              JOIN datahub.companyInstanceProperty cip USING (companyInstanceId)
            WHERE c.companyId = ?;", [$companyId]);

        $lastInstanceId = null;
        $company = false;

        foreach ($rows as $i => $row) {
            $row = $row->to_array();
            // is this the entity row?
            if ($i === 0) {
                $company = new self($row);
            }

            // is this a new instance??
            if (!isset($instance) || $row->companyInstanceId !== $lastInstanceId) {
                $instance = new CompanyInstance($row);
                // add the instance to the entity record
                $company->add_company_instance($instance);
            }

            $instance->add_property(new CompanyInstanceProperty($row));

            $lastInstanceId = $row->companyInstanceId;
        }

        return $company;
    }

}

?>
