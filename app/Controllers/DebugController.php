<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;

class DebugController
{

	public function __construct()
	{
		//dump(__CLASS__);
	}

	public function index()
	{
		$response = new Response(__METHOD__);
		return $response;
	}

	public function test()
	{
		$response = new Response(__METHOD__);
		return $response;
	}
}
