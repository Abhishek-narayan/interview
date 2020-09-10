<?php

	namespace App\Controller;

	use App\Model\UserModel;

	use Mpdf\Mpdf as Mpdf;

	Class User extends BaseController {

		public function __construct(){
			parent::__construct();
		}

		public function index($page){

			$userModel = new UserModel();

			$data = $userModel->find(2);

			$this->view('index.php',$data);

		}

		public function pdf(){

			$mpdf = new Mpdf;
			$mpdf->WriteHTML('<h1>Hello world!</h1>');
			$mpdf->Output();
			
		}

	}