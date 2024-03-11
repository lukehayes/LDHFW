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

        $routes = include "../app/routes.php";
        $this->router->setApplicationRoutes($routes);

        $routeFound = array_filter($routes, function($route) use($request)
        {
            if($route->getPath() == $request->getRequestUri())
            {
                return $route;
            }
        });


        $currentRoute = $currentRoute[0];
        $controller   = $currentRoute->getController();
        $action       = $currentRoute->getAction();

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
