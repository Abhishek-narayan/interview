<?php

	namespace App\Controller;

	Class BaseController {

		public function __construct(){

		}

		public function view($page,$data = array()){

			require_once(VIEW_PATH.'/'.$page);

		}

		public function pageNotFound(){

			$this->view('404.php');

		}

		public function __call($function,$arg){

			$this->pageNotFound();

		}

	}