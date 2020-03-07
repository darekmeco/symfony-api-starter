<?php

use NextCv\Modules\Resume\Controller\ResumeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('api_index', '/index')
        ->controller([ResumeController::class, 'all'])
        ->methods(['GET', 'HEAD']);

    $routes->add('api_index2', '/index2')
        ->controller([ResumeController::class, 'allDql'])
        ->methods(['GET', 'HEAD']);

    $routes->add('api_find', '/{id}')
        ->controller([ResumeController::class, 'find'])
        ->methods(['GET', 'HEAD']);
};
