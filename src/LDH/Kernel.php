<?php

namespace LDH;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LDH\Middleware\Middleware;

class Kernel
{
    public function __construct(
        private $middleware = [],
        public $router = new Router()
    )
    {
    }

    /**
     * Add a new middleware.
     *
     * @param Middleware       $middleware      The middleware to be added.
     *
     * @return
     */
    public function addMiddleware(Middleware $middleware)
    {
        array_push($this->middleware, $middleware);
    }

    /**
     * Start the application process.
     *
     * @param Request       $request      The current HTTP request.
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $this->runMiddleware($request);

        $routes = require_once "../app/routes.php";
        $this->router->setApplicationRoutes($routes);

        $uri = $request->getRequestUri();
        $routeObject = null;

        foreach($routes as $route)
        {
            if($route->getPath() == $uri)
            {
                $routeObject = $route;
                break;
            }
        }


        $controller   = $routeObject->getController();
        $action       = $routeObject->getAction();

        return (new $controller)->$action();
    }

    /**
     * Run every instance of middleware that has been defined.
     *
     * @param Request       $request      The current HTTP request.
     */
    public function runMiddleware(Request $request)
    {
        foreach($this->middleware as $middleware)
        {
            $middleware($request);
        }
    }

}
