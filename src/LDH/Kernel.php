<?php

namespace LDH;

use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    public function handle(Request $request): Response
    {
        $content = "<p>Loaded</p>";
        $response = new Response($content);

        return $response;
    }
}
