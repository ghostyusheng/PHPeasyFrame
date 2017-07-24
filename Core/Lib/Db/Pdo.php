<?php

namespace Core\Lib\Db;

class Pdo {
	private static $conn = null;
	
	public $db_name;
	public static $last_sql;

	public function __construct () {
	}

	public static function getInstance () {
		if (!Pdo::$conn) {
			Pdo::init_db();			
			return new Pdo();
		}

		return new Pdo();
	}
	
	public static function init_db () {
		$dsn = 'mysql:dbname=' . DB_NAME  . ';host=' . DB_HOST;
		$user = DB_USER;
		$password = DB_PASSWD;

		//print_r($dsn);
		//print_r($user);
		//print_r($password);

		try {
			Pdo::$conn = new \PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}

	}

	public function query ($sql) {
		Pdo::$last_sql = $sql;

		$res = Pdo::$conn->query($sql); 

		print_r($sql);
		print_r(Pdo::$conn);

		return $res;
	}

	public function close_db () {

	}
}
