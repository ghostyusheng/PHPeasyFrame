<?php

require 'Common/db_functions.php';

require 'Lib/Event/BaseEvent.php';

function router_dispach() 
{
    $oldDir = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
    $dir = preg_filter('#\/[a-z]*$#', '', $oldDir);

	if (HTTP_SERVER == 'nginx') {
		$oldDir = $_REQUEST['u'];
		$dir	= preg_filter('#\/[a-z_]*$#', '', $oldDir);
	}

    if (!isset($GLOBALS['routers'][$dir])) {
        throw new Exception( $_REQUEST['u'] . ' Route not found !');
    }

    $path        = $GLOBALS['routers'][$dir];
    $realPath    = $path . '.php';    

    if (!file_exists($realPath)) {
        throw new Exception('File not found !');
    }
    
    $tmpClass		= explode ('/', $dir)[count($dir)];
    $class			= ucfirst(end(explode ('/', $path)));
    $method			= end(explode ('/', $oldDir));

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

