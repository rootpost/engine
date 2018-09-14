<?php

namespace project\core;

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
  public function loadLibraries()
  {
    for($i=0; $i<count($this->_config['load']['libraries']); $i++)
    {
      $pathLibrariesApp = 'application/libraries/'.$this->_config['load']['libraries'][$i].'.php';
    
      if(file_exists($pathLibrariesApp))
      {
        require_once($pathLibrariesApp);
      }
    }
  }
/*============================================================*/
  public function loadControllers()
  {
    require_once('core/controllers/Controller.php');
    for($i=0; $i<count($this->_config['load']['controllers']); $i++)
    {
      $pathControllersApp = 'application/controllers/'.$this->_config['load']['controllers'][$i].'.php';
    
      if(file_exists($pathControllersApp))
      {
        require_once($pathControllersApp);
      }
    }
  }


}

?>