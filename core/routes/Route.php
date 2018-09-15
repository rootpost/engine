<?php

namespace project\routes;
use project\helpers\HttpHelper;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class Route
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

  public function load()
  {
    $segments = HttpHelper::getSegments();
    $segmentsStr = implode('/', $segments);
    for($i=0; $i<count($this->_config); $i++)
    {
      if($_SERVER['REQUEST_METHOD'] == $this->_config[$i]['method'])
      {
        $uri = trim($this->_config[$i]['uri'], '/');
        
        if(count($segments) !== substr_count($uri, '/')+1)
        {
          continue;
        }
        
        $uri = str_replace('#', '(.+)', $uri);
        
        if(preg_match('#^'.$uri.'$#', $segmentsStr))
        {
          for($j=0; $i<count($this->_config[$i]['regex']); $j++)
          {
            $segment = $segment[$this->_config[$i]['regex'][$j]['segment']];
            $rule = $this->_config[$i]['regex'][$j]['rule'];
            if(preg_match($rule, $segment))
            {
              continue 2;
            }
          }
          
          $run = trim($this->_config[$i]['run'], '/');
          
          if(strpos($run, '$') !== false)
          {
            $run = preg_replace('#^'.$uri.'$#', $run, $segmentsStr);
          }
          
          return $this->loadController($run, $this->_config[$i]['module']);
        }
      }
    }
    
    return false;
  }

  public function loadController($controllerData, $isModule)
  {
    $data = explode('/', $controllerData);
      
    $pathController = '';
    $titleController = '';
    $titleMethod = '';
    if($isModule)
    {
      $pathController = 'application/modules/'.$data[0].'/controllers/'.$data[1].'.php';
      $titleController = '\\project\\'.$data[0].'\\controllers\\'.$data[1];
      $titleMethod = $data[2];
      
      unset($data[0]);
      unset($data[1]);
      unset($data[2]);
    }
    else
    {
      
      $pathController = 'application/controllers/'.$data[0].'.php';
      $titleController = '\\project\\controllers\\'.$data[0];
      $titleMethod = $data[1];
      
      unset($data[0]);
      unset($data[1]);
    }
    
    $params = array_values($data);
    
    if(file_exists($pathController))
    {
      require_once($pathController);
    }
    if(class_exists($titleController) && method_exists($titleController, $titleMethod))
    {
      $customController = new $titleController();
      call_user_func_array(array($customController, $titleMethod), $params);
      return true;
    }
    
    return false;
    
  }
}

?>