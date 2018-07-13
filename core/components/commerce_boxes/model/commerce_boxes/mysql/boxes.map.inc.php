<?php
/**
 * Boxes for Commerce.
 *
 * Copyright 2018 by Tony Klapatch <tony@klapatch.net>
 *
 * This file is meant to be used with Commerce by modmore. A valid Commerce license is required.
 *
 * @package commerce_boxes
 * @license See core/components/commerce_boxes/docs/license.txt
 */

$xpdo_meta_map['Boxes']= array (
  'package' => 'commerce_boxes',
  'version' => '1.1',
  'table' => 'commerce_boxes',
  'extends' => 'comSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'MyISAM',
  ),
  'fields' => 
  array (
    'name' => '',
    'dimension_unit' => '',
    'length' => 0.0,
    'width' => 0.0,
    'height' => 0.0,
    'min_items' => 0,
    'max_items' => 0,
    'weight_unit' => '',
    'min_weight' => 0.0,
    'max_weight' => 0.0,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '190',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'dimension_unit' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '10',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'length' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,4',
      'phptype' => 'float',
      'null' => false,
      'default' => 0.0,
    ),
    'width' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,4',
      'phptype' => 'float',
      'null' => false,
      'default' => 0.0,
    ),
    'height' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,4',
      'phptype' => 'float',
      'null' => false,
      'default' => 0.0,
    ),
    'min_items' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'max_items' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'weight_unit' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '10',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'min_weight' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,4',
      'phptype' => 'float',
      'null' => false,
      'default' => 0.0,
    ),
    'max_weight' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,4',
      'phptype' => 'float',
      'null' => false,
      'default' => 0.0,
    ),
  ),
);
