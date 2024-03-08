<?php

require "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;

use LDH\Kernel;

$kernel = new Kernel();

$kernel->handle(Request::createFromGlobals());

