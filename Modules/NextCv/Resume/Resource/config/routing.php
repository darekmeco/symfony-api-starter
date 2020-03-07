<?php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->import('./routing/api.php')
        ->prefix('/api/resume')
        ->namePrefix('resume_');
};
