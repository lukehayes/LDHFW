<?php

namespace LDH;

use LDH\Route;

class Router
{
    public function __construct(
        private array $routes
    ) {}


    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
    }

    public function getRoutes() : array { return $this->routes; }


    public function dispatch() 
    {
        dump(__METHOD__);
        dump($this->routes);
    }
}
