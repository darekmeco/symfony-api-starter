<?php

$metadata->mapField([
   'id' => true,
   'fieldName' => 'id',
   'type' => 'integer',
   'generator' => [
     'strategy' => 'AUTO'
     ]
]);
$metadata->mapField(array(
   'fieldName' => 'firstname',
   'type' => 'string'
));
$metadata->mapField(array(
   'fieldName' => 'lastname',
   'type' => 'string'
));
$metadata->mapField(array(
   'fieldName' => 'position',
   'type' => 'string'
));

return $metadata;
