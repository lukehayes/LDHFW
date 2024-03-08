<?php

namespace LDH\Middleware;

use LDH\Middleware\Middleware;
use LDH\Request;

class PassThruMiddleware implements Middleware
{
    /**
     * Handle the current request then past to the next middleware.
     *
     * @param Request
     *
     * @return Request
     */
    public function next(Request $request) : Request
    {
        $request->server->add([1]);

        dump($request->server);

        return $request;
    }
}
