<?php

namespace App\Controllers;

class DebugController
{

	public function __construct()
	{
		dump(__CLASS__);
	}

	public function index()
	{
		dump(__CLASS__, __METHOD__);
	}

	public function test()
	{
		dump(__CLASS__, __METHOD__);
	}
}
