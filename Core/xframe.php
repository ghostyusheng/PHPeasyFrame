<?php

require 'Common/db_functions.php';

function router_dispach () {
	$oldDir = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
	$dir = preg_filter('#\/[a-z]*$#', '', $oldDir);

	if (!isset($GLOBALS['routers'][$dir])) {
		throw new Exception ('Route not found !');
	}

	$path		= $GLOBALS['routers'][$dir];
	$realPath	= $path . '.php';	

	if (!file_exists($realPath)) {
		throw new Exception ('File not found !');
	}
	
	$tmpClass	= split('/', $dir)[count($dir)];
	$class		= ucfirst(end(split('/', $path)));
	$method		= end(split('/', $oldDir));

	//print_r("<pre>");
	//print_r("class : " . $class);
	//print_r("\nmethod : " . $method);
	//print_r("\n realpath : " . $realPath);

	include $realPath;

	$obj = new $class;

	if (is_callable([$class, $method])) {
		$obj->$method();
	}
}

router_dispach();

