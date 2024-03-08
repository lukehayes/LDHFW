<?php

namespace LDH\Middleware;

use Symfony\Component\HttpFoundation\Request;

interface Middleware
{
    /**
     * Handle the current request then past to the next middleware.
     *
     * @param Request
     *
     * @return Request
     */
    public function __invoke(Request $request);
}
