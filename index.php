<?php

//error_reporting(E_ALL);
namespace project\index;

use project\core\Project;
use project\routes\Route;
use project\helpers\HttpHelper;
ini_set('display_errors', 'On');
define('PROJECT_ACCESS', 'true');

require_once('application/configs/configs.php');
require_once('core/Project.php');
require_once('core/routes/Route.php');
require_once('core/models/Model.php');

$project = new Project();
$project->setConfigs($config);

$project->loadHelpers();
//$project->loadModels();
$project->loadControllers();

if($config['db']['is_used'])
{
  
  require_once('core/databases/ActiveRecord.php');
  require_once('core/databases/Database.php');
  $project->loadDb();
}

//echo HttpHelper::f();

$route = new Route();
$route->setConfigs($config['route']);

if(!$route->load())
  echo '<h1>error 404</h1>';
  exit();

echo '<pre>';print_r($config);exit();

?>