<?php

namespace DB\Datahub;

/**
 * Class Company
 * @package DB\Datahub
 * @author  jrobinson (robotically)
 * @date    2016/05/05
 * @inheritdoc
 * This file is only generated once
 * Put your class specific code in here
 */
class Company extends \DBCore\Datahub\Company {

    /**
     * @var \Scoop\Database\Rows
     */
    protected $companyInstances;

    /**
     * Company constructor.
     *
     * @param array $dataArray
     */
    public function __construct ( array $dataArray = [ ]) {

        $this->companyInstances = new \Scoop\Database\Rows();

        parent::__construct( $dataArray );
    }

    /**
     * @param CompanyInstance $instance
     */
    public function add_company_instance ( CompanyInstance $instance ) {

        $this->companyInstances->add_row( $instance );
    }

    public function fetch_company_instances () {

        if( empty($this->companyId) ) {
            return;
        }

        $this->companyInstances = CompanyInstance::fetch_where( 'companyId = ?', [ $this->companyId ] );
    }

    /**
     * @return \Scoop\Database\Rows
     */
    public function get_company_instances () {

        return $this->companyInstances;
    }

    public function save () {

        if ( empty($this->createdAt) ) {
            $this->set_literal('createdAt', 'NOW()');
        }

        $this->set_literal('updatedAt', 'NOW()');

        parent::save();

        foreach ( $this->get_company_instances() as $companyInstance ) {
            $companyInstance->companyId = $this->companyId;
            $companyInstance->save();
        }
    }

}

?>
