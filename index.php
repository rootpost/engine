<?php
//ini_set('display_errors',1);

namespace project\index;

use project\core\Project;
use project\routes\Route;
use project\helpers\HttpHelper;

define('PROJECT_ACCESS', 'true');

require_once('application/configs/configs.php');
require_once('core/Project.php');
require_once('core/routes/Route.php');

$project = new Project();
$project->setConfigs($config);

$project->loadHelpers();
$project->loadLibraries();

//echo HttpHelper::f();

$route = new Route();
$route->setConfigs($config['route']);

if(!$route->load())
  echo '<h1>error 404</h1>';
  exit();

echo '<pre>';print_r($config);exit();


?>