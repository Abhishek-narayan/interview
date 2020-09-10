<?php

	namespace App\Model;

	Class Model{

		private $conn;

		function __construct($db = 'mysql'){

			$this->conn = $this->connect(db($db));

		}

		private function connect($db){

			$host 		= $db['host'];

			$username 	= $db['username'];
 
			$password 	= $db['password'];

			$dbname 	= $db['dbname'];

			try {

			  $conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

			  // set the PDO error mode to exception

			  $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

			  return $conn;

			}
			 catch(PDOException $e) {

			  echo "Connection failed: " . $e->getMessage();

			}

		}

		public function find($id){

			$query =  $this->query("SELECT * FROM ".$this->table." where id = '$id'");

			return $query->fetch();

		}

		public function get(){

			$query = $this->query("SELECT * FROM ".$this->table);

			return $query->fetchAll();

		}

		public function delete($where = array()){

			$condition = '1'; 

			foreach ($where as $key => $value) {

				if($key == 0){
					$condition = "$key = '".$value."'"; 
				}
				else{
					$condition .= "and $key = '".$value."'"; 
				}

			}

			if($this->query("DELETE FROM ".$this->table." where $condition") == TRUE){
				return true;
			}
			else{
				return false;
			}

		}

		public function update(){

		}

		public function query($query){
			
			return $this->conn->query($query);

		}

	}