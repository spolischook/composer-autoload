<?php

namespace Spolischook;

use Phroute\RouteCollector;
use Phroute\Dispatcher;
use Symfony\Component\HttpFoundation\Request;

abstract class Kernel implements KernelInterface
{
    public function handle(Request $request)
    {
        $router = $this->handleRoutes($this->getRoutes());
        $dispatcher = new Dispatcher($router);
        $response = $dispatcher->dispatch($request->getMethod(), parse_url($request->getPathInfo(), PHP_URL_PATH));

        return $response;
    }

    protected function handleRoutes(array $routes)
    {
        $controllers = $this->getControllers($routes);
        $router = new RouteCollector();

        foreach ($routes as $routeDefinition) {
            list($controller, $method) = explode(':', $routeDefinition[2]);
            $router->{strtolower($routeDefinition[0])}($routeDefinition[1], [$controllers[$controller],$method]);
        }

        return $router;
    }

    protected function getControllers($routes)
    {
        $controllers = array();

        foreach ($routes as $routeDefinition) {
            $controllerMethod = array_pop($routeDefinition);
            list($controller, $method) = explode(':', $controllerMethod);

            $controllers[$controller] = new $controller($this->getTemplateHandler());
        }

        return $controllers;
    }
}
