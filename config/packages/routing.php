<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
$container->loadFromExtension('framework', [
    'router' => [
        'utf8' => true
    ]
]);
