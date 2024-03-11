<?php

require "../vendor/autoload.php";

use LDH\Route;

return [
	new Route('/', App\Controllers\DebugController::class, 'index'),
	new Route('/test', App\Controllers\DebugController::class, 'test')
];
