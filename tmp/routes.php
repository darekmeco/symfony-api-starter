<?php
use App\Controller\ResumeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('login_check', '/login_check')
    ->methods(['POST']);

    $routes->add('get_all_resumes', '/api/resumes')
    ->controller([ResumeController::class, 'all'])
    ->methods(['GET', 'HEAD']);
};
