<?php
namespace project\databases;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class ActiveRecord
{
  private $_select = 'SELECT * ';
  private $_from;
  private $_join;
  private $_where;
  private $_groupBy;
  private $_having;
  private $_orderBy;
  private $_limit;
  
  public function __construct()
	{
    
  }
/*============================================================*/  
  public function select($select)
  {
    $this->_select = 'SELECT '.$select.' ';
  }
/*============================================================*/  
  public function from($from)
  {
    $this->_from = 'FROM '.$from.' ';
  }
/*============================================================*/  
  public function join($table, $condition, $type)
  {
    $this->_join .= $type.' JOIN '.$table.' ON '.$condition.' ';
  }
/*============================================================*/  
  public function groupBy($groupBy)
  {
    $this->_groupBy = 'GROUP BY '.$groupBy.' ';
  }
/*============================================================*/  
  public function having($havingSql)
  {
    $this->_groupBy = 'HAVING '.$havingSql.' ';
    //$this->_having = 'HAVING '.$havingSql.' ';
  }
/*============================================================*/  
  public function orderBy($orderBy, $sort = 'ASC')
  {
    $this->_orderBy = 'ORDER BY '.$orderBy.' '.$sort.' ';
  }
/*============================================================*/  
  public function limit($position, $count='')
  {
    $this->_limit = 'LIMIT '.$position;
    if($count !='')
    {
      $this->_limit .= ', '.$count;
    }
  }
/*============================================================*/  
  public function getSql()
	{
    //echo '<pre>';print_r($this);exit();
    $sql = $this->_select . $this->_from . $this->_join . $this->_where . $this->_groupBy . $this->_orderBy . $this->_limit;
    echo $sql; exit();
    return 'SELECT * FROM article';
  }
}
?>