<?php
namespace project\databases;
use project\databases\ActiveRecord;
if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class Database extends ActiveRecord
{
  private $_host;
  private $_port;
  private $_username;
  private $_password;
  private $_database;
  private $_charset;
  private $_type;
  
  private $_pdo;
/*============================================================*/  
  public function __construct()
	{
    parent::__construct();
  }
/*============================================================*/  
  public function getHost()
  {
    return $this->_host;
  }
  public function setHost($host)
  {
    $this->_host = $host;
  }
/*============================================================*/  
  public function getPort()
  {
    return $this->_port;
  }
  public function setPort($port)
  {
    $this->_port = $port;
  }
/*============================================================*/  
  public function getUsername()
  {
    return $this->_username;
  }
  public function setUsername($username)
  {
    $this->_username = $username;
  }
/*============================================================*/  
  public function getPassword()
  {
    return $this->_password;
  }
  public function setPassword($password)
  {
    $this->_password = $password;
  }
/*============================================================*/  
  public function getDatabase()
  {
    return $this->_database;
  }
  public function setDatabase($database)
  {
    $this->_database = $database;
  }
/*============================================================*/  
  public function getCharset()
  {
    return $this->_charset;
  }
  public function setCharset($charset)
  {
    $this->_charset = $charset;
  }
/*============================================================*/
  public function getType()
  {
    return $this->_type;
  }
  public function setType($type)
  {
    $this->_type = $type;
  }
/*============================================================*/
  public function init()
  {//echo '<pre>';print_r($this);exit();
    $this->_pdo = new \PDO($this->_type.':host='.$this->_host.';port='.$this->_port.';dbname='.$this->_database.';user='.$this->_username.';password='.$this->_password);
    
  }
/*============================================================*/
  public function exec($querySql)
  {
    $statement = $this->_pdo->prepare($querySql);
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
  }
/*============================================================*/
}
?>