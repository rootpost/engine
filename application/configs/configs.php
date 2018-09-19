<?php
$config = array();

$config['db']['is_used'] = true;
$config['db']['host'] = 'localhost';
$config['db']['port'] = '5432';
$config['db']['username'] = 'power';
$config['db']['password'] = '123';
$config['db']['database'] = 'power';
$config['db']['charset'] = 'utf8';
$config['db']['type'] = 'pgsql';

$config['load']['controllers'] = array('MainController');
$config['load']['helpers'] = array('HttpHelper');
//$config['load']['models'] = array('model');
//$config['load']['libraries'] = array('HttpLibrary');

$config['route'][] = array(
	'uri' => '/',
	'method' => 'GET',
	'run' => 'HomeController/index',
	'module' => false,
	'regex' => array(
	
	),
);
$config['route'][] = array(
	'uri' => 'article',
	'method' => 'GET',
	'run' => 'HomeController/article',
	'module' => false,
	'regex' => array(
	
	),
);
$config['route'][] = array(
	'uri' => 'about',
	'method' => 'GET',
	'run' => 'HomeController/about',
	'module' => false,
	'regex' => array(),
);
$config['route'][] = array(
	'uri' => 'aaaa/#/bbbb/#/qwer',
	'method' => 'GET',
	'run' => 'test1/HomeController/f/$2/$1',
	'module' => true,
	'regex' => array(
		array(
			'segment' => 1,
			'rule' => '[0-9]{1,}',
		),
		array(
			'segment' => 3,
			'rule' => '[0-9]{2}',
		),
	),
); //'run'->'имя_модуля/имя_контроллера/имя_метода/пар1/пар2/пар3'

?>