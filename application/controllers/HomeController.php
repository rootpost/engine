<?php


namespace project\controllers;

use project\controllers\MainController;
//use project\helpers\CustomHelper;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class HomeController extends MainController
{
	public function __construct()
	{
		parent::__construct();
        //$this->loadHelper('CustomHelper');
        //$this->loadModel('User', 'user');
        //$this->loadLibrary('Smarty', 'smarty');
	}
	
	public function index()
	{
		echo "Hello World";
	}
	
	public function article()
	{
		echo "ARTICLE";
        $this->display('article');
	}
	
	public function about()
	{
		echo "ABOUT";
        $this->data('about', 348762);
        $this->display('about');
        //CustomHelper::metod();
        //$this->user->metod();
        //$this->smarty->metod();
	}
	
	public function f($a, $b)
	{
        $this->data('a', $a);
        $this->data('b', $b);
        $this->display('f');
	}
}

?>