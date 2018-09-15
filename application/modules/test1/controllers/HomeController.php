<?php


namespace project\test1\controllers;

use project\controllers\MainController;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class HomeController extends MainController
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		echo "Hello World";
	}
	
	public function about()
	{
		echo "ABOUT";
	}
	
	public function f($a, $b)
	{
		echo 'Is module test1<br />';
    echo $a."<br />";
		echo $b."<br />";
	}
}

?>