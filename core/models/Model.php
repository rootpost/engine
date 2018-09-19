<?php
namespace project\models;
if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');
class Model
{
  public function __construct()
	{
		if(isset($GLOBALS['db']))
    {
      global $db;
      $this->db = $db;
    }
	}
  
  public function exec()
	{
    $querySql = $this->db->getSql();
    return $this->db->exec($querySql);
  }
}
?>