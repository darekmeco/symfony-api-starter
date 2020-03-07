<?php
$metadata->mapField([
  'id' => true,
  'fieldName' => 'id',
  'type' => 'integer',
  'generator' => [
    'strategy' => 'AUTO'
  ]
]);

$metadata->mapField([
  'fieldName' => 'firstname',
  'type' => 'string'
]);

$metadata->mapField([
  'fieldName' => 'lastname',
  'type' => 'string'
]);

$metadata->mapField([
  'fieldName' => 'position',
  'type' => 'string'
]);
