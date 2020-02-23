<?php
use App\Controller\ResumeController;
use App\Modules\NextCv\Admin\Controller\AdminController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('admin_index', '/index')
    ->controller([ResumeController::class, 'all'])
    ->methods(['GET', 'HEAD']);

    $routes->add('admin_index2', '/index2/{ja}')
    ->controller([AdminController::class, 'all'])
    ->methods(['GET', 'HEAD']);
};
