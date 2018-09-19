<?php
namespace project\core;
use project\databases\Database;
if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class Project
{
  
  private $_config;
  public function __construct()
  {
    $this->_config = array();
  }
  public function setConfigs($config)
  {
    $this->_config = $config;
  }
/*============================================================*/
  public function loadHelpers()
  {
    for($i=0; $i<count($this->_config['load']['helpers']); $i++)
    {
      $pathHelpersCore = 'core/helpers/'.$this->_config['load']['helpers'][$i].'.php';
      $pathHelpersApp = 'application/helpers/'.$this->_config['load']['helpers'][$i].'.php';
        
      if(file_exists($pathHelpersCore))
      {
        require_once($pathHelpersCore);
      }
      elseif(file_exists($pathHelpersApp))
      {
        require_once($pathHelpersApp);
      }
    }
  }
/*============================================================*/

/*============================================================*/
  public function loadControllers()
  {
    require_once('core/controllers/Controller.php');
    //echo 22;exit();
    for($i=0; $i<count($this->_config['load']['controllers']); $i++)
    {
      $pathControllersApp = 'application/controllers/'.$this->_config['load']['controllers'][$i].'.php';
    
      if(file_exists($pathControllersApp))
      {
        require_once($pathControllersApp);
      }
    }
  }
/*============================================================*/
  public function loadDb()
  {
    $db = new Database();
    $db->setHost($this->_config['db']['host']);
    $db->setPort($this->_config['db']['port']);
    $db->setUsername($this->_config['db']['username']);
    $db->setPassword($this->_config['db']['password']);
    $db->setDatabase($this->_config['db']['database']);
    $db->setCharset($this->_config['db']['charset']);
    $db->setType($this->_config['db']['type']);
    
    $db->init();
    $GLOBALS['db'] = $db;
  }


}
?>