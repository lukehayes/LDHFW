<?php

namespace LDH;

use LDH\Route;

class Router
{
    public function __construct(
        private array $routes = []
    ) {}

    /**
     * Set the routes for the application with a specific file.
     *
     * @param array    $routes   An array of LDH\Route objects.
     */
    public function setApplicationRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Add a route to the interal routes list,
     *
     * @param Route    $route
     */
    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
    }

    /**
     * Get the route list.
     *
     * @return array.
     */
    public function getRoutes() : array {
        return $this->routes;
    }


    public function dispatch()
    {
        dump(__METHOD__);
        dump($this->routes);
    }
}
