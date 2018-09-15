<?php

namespace project\controllers;

use project\controllers\Controller;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class MainController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('User', 'user');
	}
	
	public function index()
	{
		echo "Hello World";
	}
}

?>