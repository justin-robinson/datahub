<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in IssueChecklists
  */
namespace DBCore\DevRedmineBizj;

use phpr\Database\Model;

class IssueChecklists extends Model {

    const SCHEMA = 'dev_redmine_bizj';
    const TABLE = 'issue_checklists';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'issue_id',
        );

    public $id = NULL;
    public $is_done = NULL;
    public $subject = NULL;
    public $position = NULL;
    public $issue_id = NULL;
    public $DBColumnsArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'is_done' => 
          array (
          ),
          'subject' => 
          array (
          ),
          'position' => 
          array (
          ),
          'issue_id' => 
          array (
          ),
        );




}

?>