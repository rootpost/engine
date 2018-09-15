<?php


namespace project\models;

use project\models\Model;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get()
	{
        return 'qwerty';
    }
	
}

?>