<?php

namespace project\helpers;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class HttpHelper
{
  private function __construct()
  {
    
  }
  
  public static function getSegments()
  {
    $segments = explode('?', $_SERVER['REQUEST_URI']);
    $segments = trim($segments[0], '/');
    return explode('/', $segments);
  }
  
}

?>