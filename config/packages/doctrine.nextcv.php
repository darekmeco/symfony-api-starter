<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
$container->loadFromExtension('doctrine', [
    'orm' => [
        'mappings' => [
            'NextCv' => [
                'is_bundle' => false,
                'type' => 'php',
                'dir' => '%kernel.project_dir%/Modules/NextCv/Resume/doctrine',
                'prefix' => 'NextCv\Modules\Resume\Entity',
                'alias' => 'NextCv',
            ]
        ]
    ]
]);
