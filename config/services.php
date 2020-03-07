<?php

use App\Core\Modules;
use NextCv\Modules\Admin\AdminModule;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;

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
        ->exclude('../src/{DependencyInjection,Entity,Migrations,Tests,Core,Kernel.php}');

    //$services->load('App\\Controller\\', '../src/Controller');
    //->tag('controller.service_arguments');

    $services->load('NextCv\\Modules\\Admin\\Controller\\', '../Modules/NextCv/Admin/Controller');
    $services->load('NextCv\\Modules\\Admin\\', '../Modules/NextCv/Admin/*')
        ->exclude('../Modules/NextCv/Admin/Resource');

    $services->load('NextCv\\Modules\\Resume\\', '../Modules/NextCv/Resume/*')
        ->exclude('../Modules/NextCv/Resume/Resource');

    $services->set(AdminModule::class)
        ->configurator(ref(\NextCv\Modules\Admin\Config\AdminConfigurator::class));

    $services->set('app.modules')->synthetic();


    //->tag('controller.service_arguments');
};
