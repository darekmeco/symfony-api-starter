<?php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    // use the optional fifth argument of import() to exclude some files
    // or subdirectories when loading annotations
    $routes->import('./routing/admin.php')
        // this is added to the beginning of all imported route URLs
        ->prefix('/blog')
        // An imported route with an empty URL will become "/blog/"
        // Pass FALSE as the second argument to make that URL "/blog" instead
        // ->prefix('/blog', false)
        // this is added to the beginning of all imported route names
        ->namePrefix('blog_')
        // these requirements are added to all imported routes
        ->requirements(['_locale' => 'en|es|fr'])
    ;
};
