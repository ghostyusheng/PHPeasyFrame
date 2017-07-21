<?php	

namespace Core\Lib\Entity;

use Core\Lib\Db\Pdo;

abstract class AbstractEntity {	
	protected $db;
	protected static $modelPath;
	protected $data;

	public $isNew				= true;
	public $returnType			= 'Object';

	public $pageSize		= 20;
	public $page			= 1;
	public $totalPage		= 1;
	protected static $_instance = array();

	public function __construct () {
		$this->db = Pdo::getInstance(); 
	}

	public static function getInstance () {
		$className = get_called_class();
		if (!isset(self::$_instance[$className])) {
			self::$_instance[$className] = new $className();
		}

		return self::$_instance[$className];
	}
	
	public function setCurrentPage ($page) {
		$this->page = $page;

		return $this;
	}

	public function setPageSize ($pageSize) {
		$this->pageSize = $pageSize;

		return $this;
	}

	public function fetchAll () {
		
	}

	public function fetchOne () {
	}
}
