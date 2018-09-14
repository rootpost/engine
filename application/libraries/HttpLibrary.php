<?php

namespace project\libraries;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');

class HttpLibrary
{
  private function __construct()
  {
     
  }
  
  public static function f()
  {
    return '<h1>Library Http</h1>';
  }
  
}

?>