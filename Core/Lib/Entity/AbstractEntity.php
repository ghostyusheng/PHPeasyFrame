<?php	

namespace Core\Lib\Entity;

use Core\Lib\Db\Pdo;

abstract class AbstractEntity {	
	protected $db;
	protected static $modelPath;
	protected $data;

	public $isNew				= true;
	public $returnType			= 'Object';

	public $pageSize		= 10;
	public $page			= 1;
	public $totalPage		= 1;
	protected static $_instance = array();

	public function __construct ($modelPath = null) {
		$this->db = Pdo::getInstance(); 

		if ($modelPath) {
			$this->setModelPath($modelPath);
		}
	}

	public static function getInstance () {
		$className = get_called_class();
		if (!isset(self::$_instance[$className])) {
			self::$_instance[$className] = new $className();
		}

		return self::$_instance[$className];
	}

	public function getModelPath () {
		return $this->modelPath;
	}

	public function setModelPath ($modelPath) {
		$this->modelPath = $modelPath;
	}

	public function setReturnType ($type) {
		$this->returnType = $type;

		return $this;
	}
	
	public function setCurrentPage ($page) {
		$this->page = $page;

		return $this;
	}

	public function setPageSize ($pageSize) {
		$this->pageSize = $pageSize;

		return $this;
	}

	public function data () {
		return $this->data;
	}

	public function fetchAll () {
		if ($path = $this->getModelPath()) {
			$realpath = $path . '.php'; 	

			include BASE_DIR . str_replace('\\', '/', $realpath);

			$model = new $path();

			$table = explode('\\', substr($path, 1, -5));
			array_shift($table);
			$table = strtolower(implode('_', $table));

			$entity = select(['*'])
				->from($table)
				->limit(($this->page - 1) * $this->pageSize, $this->pageSize)
				->execute();

			return $entity;
		}
	}

	public function fetchOne () {

	}
}
