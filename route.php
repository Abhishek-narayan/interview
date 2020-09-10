<?php 

	$urlInfo 	= (object) pathinfo($_SERVER['PHP_SELF']);

	$url  		= strstr($urlInfo->dirname,'index.php');

	if(($url=='' || $url =='/') && $urlInfo->basename == 'index.php'){

		$controller = 'index';

		$method   = 'index';

		$param 	  = array();

	}
	else{

		$parseUrl = explode('/', trim(strstr($_SERVER['PHP_SELF'],'index.php'),'/'));

		$controller = $parseUrl[1];

		if(!empty($parseUrl[2])){
			$method     = $parseUrl[2] ;
		}
		else{
			$method     = 'index';
		}

		array_splice($parseUrl,0,3);

		$param 	    = $parseUrl;
		
	}
