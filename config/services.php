<?php
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    // default configuration for services in *this* file
    $services = $configurator->services()
        ->defaults()
            ->autowire()      // Automatically injects dependencies in your services.
            ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

    // makes classes in src/ available to be used as services
    // this creates a service per class whose id is the fully-qualified class name
    $services->load('App\\', '../src/*')
        ->exclude('../src/{DependencyInjection,Entity,Migrations,Tests,Kernel.php}');

    $services->load('App\\Controller\\', '../src/Controller')
        ->tag('controller.service_arguments');

    $services->load('NextCv\\Modules\\Admin\\Controller\\', '../Modules/NextCv/Admin/Controller');
    $services->load('NextCv\\Modules\\Admin\\', '../Modules/NextCv/Admin')
    ->exclude('Resume');

    //->tag('controller.service_arguments');
};
