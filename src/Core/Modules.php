<?php

namespace App\Core;

use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Routing\RouteCollectionBuilder;

{
    class Modules
    {
        private const CONFIG_EXTS = '.{php,xml,yaml,yml}';
        private $routes;
        private $loader;

        public function __construct()
        {
            //$this->loader = $loader;
            //$this->routes = new RouteCollectionBuilder($this->loader);
            //dump($this->routes)
        }

        public function getProjectDir(): string
        {
            return \dirname(__DIR__);
        }

        public function configureRoutes($routes): void
        {
            $confDir = $this->getProjectDir() . '/../Modules';
            $routes->import($confDir . '/NextCv/*/Resource/config/{routing}.php', '/', 'glob');
        }
    }
}