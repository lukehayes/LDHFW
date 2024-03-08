<?php

namespace LDH\Middleware;

use Symfony\Component\HttpFoundation\Request;

class PassThruMiddleware implements Middleware
{
    public function __invoke(Request $request)
    {
        dump(__CLASS__);
    }
}


