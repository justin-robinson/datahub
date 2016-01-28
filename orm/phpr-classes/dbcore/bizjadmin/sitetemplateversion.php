<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in SiteTemplateVersion
  */
namespace DBCore\Bizjadmin;

use phpr\Database\Model;

class SiteTemplateVersion extends Model {

    const SCHEMA = 'bizjadmin';
    const TABLE = 'site_template_version';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'template_id',
          1 => 'version',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'template_id',
          1 => 'template_name',
          2 => 'structure_data',
          3 => 'template_type',
          4 => 'no_html_wrapper',
          5 => 'template_category_id',
          6 => 'environment',
          7 => 'compiler_version',
          8 => 'exclude_section_css',
          9 => 'version',
        );

    public $template_id = NULL;
    public $template_name = NULL;
    public $structure_data = NULL;
    public $template_type = NULL;
    public $template_css = NULL;
    public $template_js = NULL;
    public $no_html_wrapper = NULL;
    public $template_category_id = NULL;
    public $description = NULL;
    public $modified_by = NULL;
    public $version_comment = NULL;
    public $environment = NULL;
    public $compiler_version = NULL;
    public $exclude_section_css = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $deleted_at = NULL;
    public $version = NULL;
    public $DBColumnsArray = 
        array (
          'template_id' => 
          array (
            0 => 1,
          ),
          'template_name' => 
          array (
          ),
          'structure_data' => 
          array (
          ),
          'template_type' => 
          array (
          ),
          'template_css' => 
          array (
          ),
          'template_js' => 
          array (
          ),
          'no_html_wrapper' => 
          array (
          ),
          'template_category_id' => 
          array (
          ),
          'description' => 
          array (
          ),
          'modified_by' => 
          array (
          ),
          'version_comment' => 
          array (
          ),
          'environment' => 
          array (
          ),
          'compiler_version' => 
          array (
          ),
          'exclude_section_css' => 
          array (
          ),
          'created_at' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'deleted_at' => 
          array (
          ),
          'version' => 
          array (
            0 => 1,
          ),
        );




}

?>