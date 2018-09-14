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
          //echo $run;exit();
          return $this->loadController($run);
        }
      }
    }
    
    return false;
  }

  public function loadController($controllerData)
  {
    echo '<h1>'.$controllerData.'</h1>'; exit();
    return false;
  }
}

?>