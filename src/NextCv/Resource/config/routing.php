<?php
$container->loadFromExtension('framework', [
    'admin' => [
      'resource' => "@AdminBundle/Resources/config/routing/admin.php"
      'prefix' => '/api/admin'
    ]
]);
