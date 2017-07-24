<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'SelectInterface.php';
require_once 'Pdo.php';

require CORE_DIR . 'Lib/Entity/EntityManager.php';
require CORE_DIR . 'Lib/Entity/BaseEntity.php';

use \Core\Lib\Entity\EntityManager;
use \Core\Lib\Entity\BaseEntity;

class SelectBuilder extends SqlBuilder implements SelectInterface {

	public function select (Array $fields) {
		$fields = implode(',', $fields);
		$this->sqlBuilder .= "select {$fields}";

		return $this;
	}

	public function build () {
		
	}


	public function execute () {
		$pdo  = Pdo::getInstance();
		$res  = $pdo->query($this->sqlBuilder);

		$baseEntity = new BaseEntity();
		$manager	= new EntityManager($baseEntity);

		foreach ($res as $obj) {
			$manager->create($obj);
		}

		return $baseEntity;
	}

	public function limit ($start, $offset) {
		$this->sqlBuilder .= " limit {$start},{$offset}";

		return $this;
	}

	public function buildSql() {
		echo $this->sqlBuilder;
	}

}
