<?php
/**
 * 
 */
class Connection
{	
	private $dbhost = "localhost";
	private $dbname = "db_vuejs_tutorial";
	private $dbuser = "root";
	private $dbpass = "";
	public $db;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		try {
			$this->db = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}",$this->dbuser, $this->dbpass);
		  	$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  	// echo "Connected successfully";
		}
		catch(PDOException $e) {
		  echo "Connection error: " . $e->getMessage();
		}
	}


	// private $servername;
	// private $username;
	// private $password;
	// private $dbname;
	// private $charset;
	// public $db;

	// public function __construct(){
	// 	$this->connect();
	// }

	// public function connect(){
	// 	$this->servername = "localhost";
	// 	$this->username = "root";
	// 	$this->password = "";
	// 	$this->dbname = "db_vuejs_tutorial";
	// 	$this->charset = "utf8mb4";

	// 	try {
	// 		$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".';charset=utf8mb4';
	// 		$pdo = new PDO($dsn, $this->username, $this->password);
	// 		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 		echo "Connected successfully";
	// 		return $pdo;
	// 	}
	// 	catch (PDOException $e) {
	// 		echo "Connection error: ".$e->getMessage();
	// 	}
	// }
}

// $dsn = 'mysql:host=' .$this->host .';dbname='. $this->dbname.';charset=utf8mb4';