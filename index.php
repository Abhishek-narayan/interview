<?php

	define('APPPATH','App');
	
	define('VIEW_PATH',APPPATH.'/View');

	require_once('route.php');

	require_once('helper.php');

	require_once('vendor/autoload.php');

	spl_autoload_register('includeclass');

	function includeclass($className){

		$class = str_replace('\\', DIRECTORY_SEPARATOR, $className);

		if(file_exists($class.'.php')){
			require_once($class.'.php');
		}
		else{
			echo 'Controller not found';
			exit;
		}

	}


	try{

		$className   = 'App\Controller\\'.ucfirst($controller);

		$obj = new $className();

		$obj->$method($param);

	}
	catch(\Exception $e){

		echo $e->getMessage();

	}