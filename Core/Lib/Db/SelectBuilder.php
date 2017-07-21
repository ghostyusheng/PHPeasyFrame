<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'SelectInterface.php';
require_once 'Pdo.php';

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

		return $res;
	}

	public function buildSql() {
		echo $this->sqlBuilder;
	}

}
