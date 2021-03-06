<?php
$container->loadFromExtension('doctrine', [
    'dbal' => [
        'url' => '%env(resolve:DATABASE_URL)%'
    ],
    'orm' => [
        'auto_generate_proxy_classes' => true,
        'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
        'auto_mapping' => true,
        'mappings' => [
            'App' => [
                'is_bundle' => false,
                'type' => 'php',
                'dir' => '%kernel.project_dir%/src/doctrine',
                'prefix' => 'App\Entity',
                'alias' => 'App',

            ]
        ]

    ]
]);
