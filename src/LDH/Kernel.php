<?php

namespace LDH;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LDH\Middleware\Middleware;

class Kernel
{
    public function __construct(
        private $middleware = []
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

        $content = "<p>Loaded</p>";
        $response = new Response($content);

        return $response->send();
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
