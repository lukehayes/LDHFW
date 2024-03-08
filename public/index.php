<?php

require "../vendor/autoload.php";

use  LDH\Request;
use  LDH\Kernel;

$kernel = new Kernel();
$response = $kernel->handle(Request::createFromGlobals());

$response->send();

