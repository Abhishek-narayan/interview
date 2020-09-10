<?php 

	$urlInfo 	= (object) pathinfo($_SERVER['PHP_SELF']);

	$url  		= str_replace('/index.php','', $urlInfo->dirname);

	if(($url=='' || $url =='/') && $urlInfo->basename == 'index.php'){

		$controller = 'index';

		$method   = 'index';

		$param 	  = array();

	}
	else{

		$parseUrl = explode('/', trim($_SERVER['PHP_SELF'],'/'));

		$indexPos = strpos($_SERVER['PHP_SELF'],'index.php');

		if($indexPos){


			$controller = $parseUrl[1];

			if(!empty($parseUrl[2])){
				$method     = $parseUrl[2] ;
			}
			else{
				$method     = 'index';
			}

			array_splice($parseUrl,0,3);

			if(!empty($parseUrl[0])){
				$param 	    = $parseUrl;
			}
			else{
				$param 	    = array();
			}

		}
		else{

			$controller = $parseUrl[0];

			if(!empty($parseUrl[1])){
				$method     = $parseUrl[1] ;
			}
			else{
				$method     = 'index';
			}

			array_splice($parseUrl,0,2);

			$param 	    = $parseUrl;
			
		}
		
	}
