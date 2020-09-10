<?php

	namespace App\Controller;

	use App\Model\UserModel;

	Class index extends BaseController {

		public function __construct(){
			parent::__construct();
		}

		public function index($page){

			$this->view('index.php');

		}

	}