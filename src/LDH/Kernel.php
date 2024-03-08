<?php

namespace LDH;

use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    /** @var middleware[] */
    private $middleware = [];

    public function __construct()
    {
    }

    /**
     * Start the application process.
     *
     * @param Reqeust $request.
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $this->runMiddleware($request);

        $content = "<p>Loaded</p>";
        $response = new Response($content);

        return $response;
    }

    /**
     * Run every instance of middleware that has been defined.
     *
     * @param Reqeust $request.
     */
    public function runMiddleware(Request $request)
    {
        foreach($this->middleware as $middleware)
        {
            $middleware->next($request);
        }
    }
}
