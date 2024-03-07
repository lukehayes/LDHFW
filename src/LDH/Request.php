<?php

namespace LDH;

use  Symfony\Component\HttpFoundation\Request as HttpRequest;

class Request extends HttpRequest
{
	public function __construct()
	{
		parent::__construct();
	}
}
