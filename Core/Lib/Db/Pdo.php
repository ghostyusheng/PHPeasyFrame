<?php
namespace Core\Pdo\Db;

class Pdo {
	private static $conn = "";

	public static function getInstance () {
		if (!Pdo::$conn) {
			return new Pdo();
		}

		return Pdo::$conn;
	}
	
	public function init_db () {
		$dsn = 'mysql:dbname=' . DB_NAME  . ';host=' . DB_HOST;
		$user = DB_USER;
		$password = DB_PASSWD;

		try {
			$this->conn = new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}

	public function close_db () {

	}
}
