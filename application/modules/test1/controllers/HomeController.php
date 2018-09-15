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
	
	public function titleModule()
	{
        return 'test1';
    }
	
	public function f($a, $b)
	{
        $user = $this->user->get();
        
        $this->data('user', $user);
        $this->data('a', $a);
        $this->data('b', $b);
        $this->display('f');
	}
}

?>