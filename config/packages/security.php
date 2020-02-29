<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
$container->loadFromExtension('security', [
    'encoders' => [
        'App\Entity\User' => [
            'algorithm' => 'bcrypt'
        ],
    ],
    'providers' => [
        'entity_provider' => [
            'entity' => [
                'class' => 'App\Entity\User',
                'property' => 'email'
            ],
        ],
    ],
    'firewalls' => [
        'dev' => [
            'pattern' => '^/(_(profiler|wdt)|css|images|js)/',
            'security' => false
        ],
        'login' => [
            'pattern' => '^/login',
            'stateless' => true,
            'anonymous' => true,
            'json_login' => [
                'check_path' => '/login_check',
                'success_handler' => 'lexik_jwt_authentication.handler.authentication_success',
                'failure_handler' => 'lexik_jwt_authentication.handler.authentication_failure'
            ],
        ],
        'api' => [
            'pattern' => '^/api',
            'stateless' => true,
            'anonymous' => true,
            'provider' => 'entity_provider',
            'guard' => [
                'authenticators' => [
                    'lexik_jwt_authentication.jwt_token_authenticator'
                ],
            ]
        ],
        'main' => [
            'anonymous' => true,
            'logout' => true,
            'stateless' => true,
            'guard' => [
                'authenticators' => [
                    'App\Security\TokenAuthenticator'
                ]
            ],
            //'switch_user' => true,
        ],
    ],
    # Easy way to control access for large sections of your site
    # Note Only the *first* access control that matches will be used
    'access_control' => [
        ['path' => '^/login', 'roles' => 'IS_AUTHENTICATED_ANONYMOUSLY'],
        ['path' => '^/register', 'roles' => 'IS_AUTHENTICATED_ANONYMOUSLY'],
        ['path' => '^/api', 'roles' => 'IS_AUTHENTICATED_ANONYMOUSLY'],
    ]
]);
#- { path=> ^/api, roles=> IS_AUTHENTICATED_FULLY }
# - { path=> ^/admin, roles=> ROLE_ADMIN }
# - { path=> ^/profile, roles=> ROLE_USER }
