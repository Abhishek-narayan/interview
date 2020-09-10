<?php

	function db($connection){

		include('database.php');

		return $database[$connection];

	}

	function siteUrl(){
		return 'http://interview.local/';
	}