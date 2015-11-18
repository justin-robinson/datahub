#!/usr/bin/env php
<?php
/**
 * Doctrine1 YAML Converter
 * 
 * @author      Bizjournals Team
 * @copyright   (C) 2013-2014. All rights reserved.
 * @version     SVN: $Id: $
 */

use Zend\Console;
use Zend\Loader\StandardAutoloader;
use Symfony\Component\Yaml\Yaml;
/**
 * Generate class maps for use with autoloading.
 *
 * Usage:
 * --help|-h                    Get usage message
 * --input|-i [ <string> ]      The Doctrine 1 YAML file to convert
 * --output|-o [ <string> ]     Where to write Doctrine 2 YAML files; if not provided, assumes CWD
 * --namespace|-n [ <string> ]  The namespace to use.  Defaults to camelcased connection string
 * --overwrite|-w               Whether or not to existing YAML files
 */

$zfLibraryPath = getenv('LIB_PATH') ? getenv('LIB_PATH') : __DIR__ . '/../vendor/zendframework/zendframework/library';
if (is_dir($zfLibraryPath)) {
    // Try to load StandardAutoloader from library
    if (false === include($zfLibraryPath . '/Zend/Loader/StandardAutoloader.php')) {
        echo 'Unable to locate autoloader via library; aborting' . PHP_EOL;
        exit(2);
    }
} else {
    // Try to load StandardAutoloader from include_path
    if (false === include('Zend/Loader/StandardAutoloader.php')) {
        echo 'Unable to locate autoloader via include_path; aborting' . PHP_EOL;
        exit(2);
    }
}

$libraryPath = getcwd();

// Setup autoloading
$loader = new StandardAutoloader(array('autoregister_zf' => true));
$loader->register();
$loader->registerNamespace('Symfony', $zfLibraryPath . '/../../../symfony/yaml/Symfony');

$rules = array(
    'help|h'      => 'Get usage message',
    'input|i-s'   => 'The Doctrine 1 YAML file to convert',
    'output|o-s'  => 'Where to write Doctrine 2 YAML files; if not provided, assumes CWD',
    'namespace|n-s' => 'The namespace to use.  Defaults to camelcased connection string',
    'overwrite|w' => 'Whether or not to overwrite existing YAML files',
);

try {
    $opts = new Console\Getopt($rules);
    $opts->parse();
} catch (Console\Exception\RuntimeException $e) {
    echo $e->getUsageMessage();
    exit(2);
}

if ($opts->getOption('h')) {
    echo $opts->getUsageMessage();
    exit(0);
}

$libraryPath = str_replace(DIRECTORY_SEPARATOR, '/', realpath($libraryPath));

$usingStdout = false;
$output = $libraryPath;
if (isset($opts->o)) {
    $output = $opts->o;
    if ('-' == $output) {
        $output = STDOUT;
        $usingStdout = true;
    } elseif (!is_writeable(dirname($output))) {
        echo "Cannot write to '$output'; aborting." . PHP_EOL
            . PHP_EOL
            . $opts->getUsageMessage();
        exit(2);
    } else {
    }
}

$inputFile = '';
if (isset($opts->i)) {
    $inputFile = $opts->i;
    if (!is_file($inputFile)) {
        echo "File not found - '$inputFile'; aborting." . PHP_EOL
            . PHP_EOL
            . $opts->getUsageMessage();
        exit(2);
    }
} else {
    echo $opts->getUsageMessage();
    exit(0);
}

$namespace = '';
if (isset($opts->n)) {
    $namespace = $opts->n;
}


if (!$usingStdout) {
    echo "Creating YAML files in '$libraryPath'..." . PHP_EOL;
}

$classTableMapping = array();
$data = Yaml::parse($inputFile, true, false);
// First pass - build array of classes and table names.
foreach ($data as $class => $defn) {
    if (in_array($class, array('connection','options'))) {
        if (empty($namespace) && $class == 'connection') {
            $namespace = str_replace(' ', '', ucwords(str_replace(array('-', '_'), ' ', trim($defn))));
        }
    } else {
        if (isset($defn['tableName'])) {
            $classTableMapping[$class] = $defn['tableName'];
            if (!empty($defn['relations']) && is_array($defn['relations'])) {
                // Check if foreign relations are defined here ... If so, add then to the appropriate (related) class.
                foreach ($defn['relations'] as $relation_name => $relation_data) {
                    if (!empty($relation_data['foreignType'])) {
                        $relation_class = (empty($relation_data['class']) ? $relation_name : $relation_data['class']);
                        if (empty($data[$relation_class]['relations'][$class]) && empty($data[$relation_class]['relations'][$class . 's'])) {
                            if (isset($data[$relation_class])) {
                                if (!isset($data[$relation_class]['relations'])) {
                                    $data[$relation_class]['relations'] = array();
                                }
                                $new_relation = array(
                                    'type'      => $relation_data['foreignType'],
                                    'local'     => $relation_data['foreign'],
                                    'foreign'   => $relation_data['local'],
                                );
                                $class_key = $class;
                                if ($relation_data['foreignType'] == 'many') {
                                    $class_key .= 's';
                                    $new_relation['class'] = $class;
                                }
                                $data[$relation_class]['relations'][$class_key] = $new_relation;
                            }
                        }
                    }
                }
            }
        } else {
            echo "ERROR: No tablename for $class\n";
        }
    }
}
//\Zend\Debug\Debug::dump($classTableMapping, "MAPPING: ");

// Second pass - build Doctrine 2 YAML files.
foreach ($data as $class => $defn) {
    if (!in_array($class, array('connection','options'))) {
        $primary_key = null;
        $newdefn = $actAsData = $timestampable = $versionable = $softdelete = $relations = $uniques = array();
        $class = preg_replace('|^ACL|', 'Acl', $class);
        $newdefn['type'] = 'entity';
        foreach ($defn as $section => $section_data) {
            switch ($section) {
                case 'options':
                case 'connection':
                    // Obsolete - do nothing
                    break;
                case 'tableName':
                    $newdefn['table'] = trim($section_data);
                    break;
                case 'columns':
                    $new_data = array();
                    if ($timestampable) {
                        foreach ($timestampable as $column_name => $column_config) {
                            if (empty($section_data[$column_name])) {
                                $section_data[$column_name] = array('type' => 'timestamp(25)', 'notnull' => true);
                            }
                        }
                    }
                    if ($versionable) {
                        foreach ($versionable as $column_name => $column_config) {
                            if (empty($section_data[$column_name])) {
                                $section_data[$column_name] = array('type' => 'integer(4)', 'unsigned' => true, 'notnull' => true);
                            }
                        }
                    }
                    foreach ($section_data as $column_name => $column_data) {
                        $new_column = array();
                        $isEnum = $isBoolean = false;
                        if (isset($column_data['primary']) && $column_data['primary'] == true) {
                            $column_data['notnull'] = true;
                        }
                        if (!isset($column_data['notnull'])) {
                            $column_data['notnull'] = false;
                        }
                        foreach ($column_data as $col_key => $col_value) {
                            switch ($col_key) {
                                case 'fixed':
                                    // Obsolete - do nothing
                                    break;
                                case 'type':
                                    $col_parts = explode('(', $col_value);
                                    if ($col_parts[0] == 'clob') {
                                        $new_column[$col_key] = 'string';
                                    } elseif ($col_parts[0] == 'string') {
                                        $new_column[$col_key] = $col_parts[0];
                                        if (isset($col_parts[1])) {
                                            $length = str_replace(')', '', $col_parts[1]);
                                            $new_column['length'] = intval(trim(str_replace(')', '', $col_parts[1])));
                                        }
                                    } elseif ($col_parts[0] == 'timestamp') {
                                        $new_column[$col_key] = 'datetime';
                                        if (count($timestampable)) {
                                            if (!empty($timestampable[$column_name])) {
                                                if (!isset($new_column['options'])) {
                                                    $new_column['options'] = array();
                                                }
                                                $new_column['options']['timestampable'] = array('on' => $timestampable[$column_name]);
                                                unset($timestampable[$column_name]);
                                            }
                                        }
                                    } elseif ($col_parts[0] == 'enum') {
                                        $isEnum = true;
                                        $new_column[$col_key] = 'string';
                                    } else {
                                        $new_column[$col_key] = $col_parts[0];
                                        if ($col_parts[0] == 'boolean') {
                                            $isBoolean = true;
                                        }
                                    }
                                    break;
                                case 'values':
                                    //$new_column[$col_key] = (is_array($col_value) ? '[' . implode(', ', $col_value) . ']' : $col_value);
                                    if ($isEnum) {
                                        $new_column['columnDefinition'] = 'enum(' . "'" . implode(", '", $col_value) . "'" . ')';
                                    }
                                    if (!isset($new_column['options'])) {
                                        $new_column['options'] = array();
                                    }
                                    $new_column['options']['validate'] = $col_value;
                                    break;
                                case 'default':
                                    if (!isset($new_column['options'])) {
                                        $new_column['options'] = array();
                                    }
                                    $new_column['options'][$col_key] = ($isBoolean ? (bool) $col_value : str_replace(array("'",'"'), '', $col_value));
                                    if (isset($new_column['type']) && $new_column['type'] == 'integer') {
                                        $new_column['options'][$col_key] = intval($new_column['options'][$col_key]);
                                    }
                                    if (isset($new_column['columnDefinition'])) {
                                        $new_column['columnDefinition'] .= " NOT NULL DEFAULT '$col_value'";
                                    }
                                    break;
                                case 'unique':
                                    $uniques[$column_name] = (bool) $col_value;
                                    break;
                                case 'unsigned':
                                    $new_column[$col_key] = (bool) $col_value;
                                    break;
                                case 'notnull':
                                    $new_column['nullable'] = !(bool) $col_value;
                                    break;
                                case 'primary':
                                    $new_column['id'] = (bool) $col_value;
                                    $primary_key = $col_key;
                                    break;
                                case 'autoincrement':
                                    if ((bool) $col_value) {
                                        $new_column['generator'] = array('strategy' => 'AUTO');
                                    }
                                    break;
                                default:
                                    if (is_array($col_value)) {
                                        $new_column[$col_key] = $col_value;
                                    } else {
                                        $new_column[$col_key] = trim($col_value);
                                    }
                            } //end-switch($col_key)
                        } //end-foreach($column_data)
                        //if (isset($softdelete[$column_name])) {
                        //    if (!isset($new_column['options'])) {
                        //        $new_column['options'] = array();
                        //    }
                        //    $new_column['options']['softdelete'] = $softdelete[$column_name];
                        //}
                        if (isset($versionable[$column_name])) {
                            if (!isset($new_column['options'])) {
                                $new_column['options'] = array();
                            }
                            $new_column['options']['versionable'] = array('class' => $versionable[$column_name]);
                        }
                        if (isset($new_column['options'])) {
                            $colOpts = $new_column['options'];
                            unset($new_column['options']);
                            $new_column['options'] = $colOpts;
                        }
                        if (isset($new_column['nullable']) && $new_column['nullable'] == false) {
                            unset($new_column['nullable']);
                        }
                        $new_data[$column_name] = $new_column;
                    } // end-foreach($section_data)
                    $newdefn['fields'] = $new_data;
                    break;
                case 'actAs':
                    $gedmo = array();
                    foreach ($section_data as $actkey => $actvalue) {
                        if (is_numeric($actkey) && !is_array($actvalue)) {
                            $actAsData[$actvalue] = array();
                        } else {
                            $actAsData[$actkey] = $actvalue;
                        }
                    }
                    if (isset($actAsData['NestedSet'])) {
                        echo "WARNING: NestedSet configuration is not migrated\n";
                    }
                    if (isset($actAsData['Timestampable'])) {
                        $timestampable = array('created_at' => 'create', 'updated_at' => 'update');
                        if (is_array($actAsData['Timestampable'])) {
                            foreach ($actAsData['Timestampable'] as $tskey => $tsconfig) {
                                if (isset($tsconfig['disabled']) && $tsconfig['disabled']) {
                                    unset($timestampable[$tskey . '_at']);
                                }
                                if (!empty($tsconfig['name'])) {
                                    unset($timestampable[$tskey . '_at']);
                                    $timestampable[$tsconfig['name']] = substr($tskey, 0, 6);
                                }
                            }
                        }
                    }
                    if (isset($actAsData['Versionable'])) {
                        $versionable = array('version' => $class . 'Version');
                        if (is_array($actAsData['Versionable'])) {
                            $versionKey = 'version';
                            if (isset($actAsData['Versionable']['version']['name'])) {
                                $versionKey = $actAsData['Versionable']['version']['name'];
                                unset($versionable['version']);
                                $versionable[$versionKey] = $class . 'Version';
                            }
                            if (isset($actAsData['Versionable']['className'])) {
                                $versionable[$versionKey] = str_replace('%CLASS%', $class, $actAsData['Versionable']['className']);
                            }
                        }
                    }
                    if (isset($actAsData['SoftDelete'])) {
                        $softdelete = array('deleted_at' => true);
                        $gedmo['soft_deleteable'] = array('field_name' => 'deleted_at', 'time_aware' => false);
                    }
                    if (!empty($gedmo)) {
                        $newdefn['gedmo'] = $gedmo;
                    }
                    break;
                case 'relations':
                    $typeMatch = array('many' => 'oneToMany', 'one' => 'manyToOne', 'oneToMany' => 'oneToMany', 'manyToMany' => 'manyToMany');
                    foreach ($section_data as $relation_name => $relation_data) {
                        $relation_name = preg_replace('|^ACL|', 'Acl', $relation_name);
                        if (isset($relation_data['class'])) {
                            $relation_data['class'] = preg_replace('|^ACL|', 'Acl', $relation_data['class']);
                        }
                        $item = array();
                        $type =  (empty($relation_data['type']) ? 'oneToMany' : $relation_data['type']);
                        if (!empty($relation_data['refClass'])) {
                            $type = 'manyToMany';
                        }
                        $type = $typeMatch[$type];
                        if (!isset($relations[$type])) {
                            $relations[$type] = array();
                        }
                        switch ($type) {
                            case 'oneToMany':
                                $item['targetEntity'] = (empty($relation_data['class']) ? $relation_name : $relation_data['class']);
                                $item['mappedBy'] = trim($class);
                                break;
                            case 'manyToOne':
                            case 'oneToOne:':
                                $item['targetEntity'] = (empty($relation_data['class']) ? $relation_name : $relation_data['class']);
                                $ref_column = (empty($relation_data['local']) ? $primary_key : $relation_data['local']);
                                $item['joinColumn'] = array(
                                    'name' => $ref_column,
                                    'referencedColumnName' => (empty($relation_data['foreign']) ? $ref_column : $relation_data['foreign']),
                                );
                                break;
                            case 'manyToMany':
                                $item['targetEntity'] = (empty($relation_data['class']) ? $relation_name : $relation_data['class']);
                                $ref_column = (empty($relation_data['local']) ? $primary_key : $relation_data['local']);
                                $item['joinTable'] = array(
                                    'name' => $classTableMapping[$relation_data['refClass']],
                                    'schema' => $relation_data['refClass'],
                                    'joinColumns' => array(
                                        $ref_column => array(
                                            'referencedColumnName' => $ref_column,
                                        ),
                                    ),
                                    'inverseJoinColumns' => array(
                                        (empty($relation_data['foreign']) ? $ref_column : $relation_data['foreign']) => array(
                                            'referencedColumnName' => (empty($relation_data['foreign']) ? $ref_column : $relation_data['foreign']),
                                        ),
                                    ),
                                );
                                break;
                        }
                        if (in_array($type, array('oneToMany','oneToOne'))) {
                            // Only implement cascades on oneToMany or oneToOne relations.
                            $cascades = (isset($relation_data['cascade']) ?
                                (is_array($relation_data['cascade'])
                                    ? $relation_data['cascade'] 
                                    : array($relation_data['cascade'])
                                ) : array());
                            $item['cascade'] = array((in_array('delete', $cascades) ? 'all' : 'persist'));
                        }
                        $relations[$type][$relation_name] = $item;
                    } // end-foreach
                    break;
                case 'indexes':
                    foreach ($section_data as $relation_name => &$relation_data) {
                        if (isset($relation_data['fields'])) {
                            $relation_data['columns'] = $relation_data['fields'];
                            unset($relation_data['fields']);
                        }
                        if (isset($relation_data['type']) && $relation_data['type'] == 'unique') {
                            $uniques['idx:' . $relation_name] = $relation_data;
                            unset($section_data[$relation_name]);
                        }
                    }
                    if (count($section_data)) {
                        $newdefn[$section] = $section_data;
                    }
                    break;
                default:
                    if (is_array($section_data)) {
                        $newdefn[$section] = $section_data;
                    } else {
                        $newdefn[$section] = trim($section_data);
                    }
            } //end-switch($section)
        } //FI: end-if

        if (count($uniques)) {
            $newdefn['uniqueConstraints'] = array();
            foreach ($uniques as $column_name => $isset) {
                if ($isset) {
                    if (is_array($isset)) {
                        $indkey = trim(str_replace('idx:', '', $column_name));
                        $newdefn['uniqueConstraints'][$indkey] = array('columns' => $isset['columns']);
                    } else {
                        $indkey = trim($column_name) . '_idx';
                        $newdefn['uniqueConstraints'][$indkey] = array('columns' => array($column_name));
                    }
                }
            }
        }
        if (count($relations)) {
            $newdefn['relations'] = $relations;
        }

        $entity = sprintf('Entity\%s\%s', $namespace, trim($class));
        //$yaml = Yaml::dump(array($entity => $newdefn), 6, 2, true, false);
        $yaml = $entity . ":\n";
        $sizes = array('type' => 6, 'table' => 6, 'gedmo' => 6, 'fields' => 6, 'uniqueConstraints' => 4, 'indexes' => 4, 'relations' => 8);
        foreach ($newdefn as $defnkey => $defnconfig) {
            if ($defnkey == 'relations') {
                $itemKey = $defnkey;
                foreach ($defnconfig as $relation_type => $relation_data) {
                    $size = ($relation_type == 'oneToMany' ? 4 : $sizes[$defnkey]);
                    $subyaml = Yaml::dump(array(0 => array($relation_type => $relation_data)), $size, 2, true, false);
                    $yaml .= substr($subyaml, 2);
                    $itemKey = 0;
                }
            } else if ($defnkey == 'fields') {
                $itemKey = $defnkey;
                foreach ($defnconfig as $field_name => $field_data) {
                    $size = (isset($field_data['options']['validate']) ? 5 : $sizes[$defnkey]);
                    $colDefn = null;
                    if (isset($field_data['columnDefinition'])) {
                        $colDefn = str_replace(", '", "', '", $field_data['columnDefinition']);
                        unset($field_data['columnDefinition']);
                    }
                    $subyaml = Yaml::dump(array(array($itemKey => array($field_name => $field_data))), $size, 2, true, false);
                    if (!empty($colDefn)) {
                        $subyaml = preg_replace('|type\: (.+)\n|', 'type: $1' . "\n      columnDefinition: $colDefn\n", $subyaml);
                    }
                    if (isset($field_data['options']['default']) && !is_bool($field_data['options']['default']) && !is_numeric($field_data['options']['default'])) {
                        $fddefault = trim($field_data['options']['default']);
                        if (!empty($fddefault) && $field_data['type'] != 'integer') {
                            $subyaml = str_replace("''", "'", preg_replace('|default\: (.+)\n|', "default: '$1'\n", $subyaml));
                        }
                    }
                    $yaml .= substr($subyaml, ($itemKey ? 2 : 6));
                    $itemKey = 0;
                }
            } else {
                $yaml .= substr(Yaml::dump(array(array($defnkey => $defnconfig)), $sizes[$defnkey], 2, true, false), 2);
            }
        } // end-foreach($new)

        $filename = str_replace('\\', '.', $entity) . '.dcm.yml';
        file_put_contents($output . '/' . $filename, rtrim($yaml, "\n") . "\n");
        if (!$usingStdout) {
            echo ".. saved $filename...\n";
        }

    } // end-if(in_array)
} // end-foreach($data)

