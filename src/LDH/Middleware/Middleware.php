<?php

namespace LDH\Middleware;

use LDH\Request;

interface Middleware
{
    /**
     * Handle the current request then past to the next middleware.
     *
     * @param Request
     *
     * @return Request
     */
    public function next(Request $request) : Request;
}
