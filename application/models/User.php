<?php
namespace project\models;
use project\models\Model;
if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class User extends Model
{
	private $_table = 'article';
  
  public function __construct()
	{
		parent::__construct();
	}
	
	public function get()
	{
    //echo '<pre>';print_r($this->db);exit();
    //return $this->db->exec('SELECT * FROM article');
    $this->db->select('datetime, title');
    $this->db->from($this->_table);
    $this->db->join('table1 AS t1', 'user.id = t1.user_id', 'INNER');
    $this->db->join('table1', 'user.id = table1.user_id', 'LEFT OUTER');
    $this->db->join('table1', 'user.id = table1.user_id', 'RIGHT');
    $this->db->orderBy('user.id', 'DESC');
    $this->db->limit(10, 20);
    
    return $this->exec();
  }
	
}

?>