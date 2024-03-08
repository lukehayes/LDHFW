<?php

namespace LDH\Middleware;

use Symfony\Component\HttpFoundation\Request;

class AuthMiddleware implements Middleware
{
    public function __invoke(Request $request)
    {
        dump(__CLASS__);

        $request->hasPreviousSession() ?
            dump("Previous Session Exists") :
            dump("No Session Found");
    }
}
