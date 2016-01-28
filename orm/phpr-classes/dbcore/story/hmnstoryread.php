<?php
/**
  * @author jrobinson (robotically)
  * @date 2016/01/28
  * AUTO-GENERATED FILE
  * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
  * Put your code in HmnStoryRead
  */
namespace DBCore\Story;

use phpr\Database\Model;

class HmnStoryRead extends Model {

    const SCHEMA = 'story';
    const TABLE = 'hmn_story_read';
    const AUTO_INCREMENT_COLUMN = '';
    const PRIMARY_KEYS = 
        array (
          0 => 'story_id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'story_id',
          1 => 'site_id',
          2 => 'c_time',
          3 => 'major_rev',
          4 => 'minor_rev',
          5 => 'rev_time',
          6 => 'release_status',
          7 => 'release_time',
          8 => 'issue_id',
          9 => 'issue_date',
          10 => 'pub',
          11 => 'slug',
          12 => 'story_type',
          13 => 'story_type_order_num',
          14 => 'story_sequence_num',
          15 => 'display_timeofday',
          16 => 'display_date',
        );

    public $story_id = NULL;
    public $site_id = NULL;
    public $c_time = NULL;
    public $major_rev = NULL;
    public $minor_rev = NULL;
    public $rev_time = NULL;
    public $release_status = NULL;
    public $release_time = NULL;
    public $issue_id = NULL;
    public $issue_date = NULL;
    public $pub = NULL;
    public $slug = NULL;
    public $story_type = NULL;
    public $story_type_order_num = NULL;
    public $story_sequence_num = NULL;
    public $display_timeofday = NULL;
    public $display_date = NULL;
    public $named_section_id = NULL;
    public $fixture = NULL;
    public $byline = NULL;
    public $bylineinfo = NULL;
    public $original_byline = NULL;
    public $tagline = NULL;
    public $copyrite = NULL;
    public $teaser = NULL;
    public $editors_note = NULL;
    public $headline = NULL;
    public $subhead = NULL;
    public $external_url = NULL;
    public $publication_src = NULL;
    public $body_content = NULL;
    public $is_premium = NULL;
    public $teaser_headline = NULL;
    public $default_skin = NULL;
    public $parent_story_id = NULL;
    public $DBColumnsArray = 
        array (
          'story_id' => 
          array (
            0 => 1,
          ),
          'site_id' => 
          array (
          ),
          'c_time' => 
          array (
          ),
          'major_rev' => 
          array (
          ),
          'minor_rev' => 
          array (
          ),
          'rev_time' => 
          array (
          ),
          'release_status' => 
          array (
          ),
          'release_time' => 
          array (
          ),
          'issue_id' => 
          array (
          ),
          'issue_date' => 
          array (
          ),
          'pub' => 
          array (
          ),
          'slug' => 
          array (
          ),
          'story_type' => 
          array (
          ),
          'story_type_order_num' => 
          array (
          ),
          'story_sequence_num' => 
          array (
          ),
          'display_timeofday' => 
          array (
          ),
          'display_date' => 
          array (
          ),
          'named_section_id' => 
          array (
          ),
          'fixture' => 
          array (
          ),
          'byline' => 
          array (
          ),
          'bylineinfo' => 
          array (
          ),
          'original_byline' => 
          array (
          ),
          'tagline' => 
          array (
          ),
          'copyrite' => 
          array (
          ),
          'teaser' => 
          array (
          ),
          'editors_note' => 
          array (
          ),
          'headline' => 
          array (
          ),
          'subhead' => 
          array (
          ),
          'external_url' => 
          array (
          ),
          'publication_src' => 
          array (
          ),
          'body_content' => 
          array (
          ),
          'is_premium' => 
          array (
          ),
          'teaser_headline' => 
          array (
          ),
          'default_skin' => 
          array (
          ),
          'parent_story_id' => 
          array (
          ),
        );




}

?>