<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'SelectInterface.php';

class SelectBuilder extends SqlBuilder implements SelectInterface {

	public function select (Array $fields) {
		$fields = implode(',', $fields);
		$this->sqlBuilder .= "select {$fields}";

		return $this;
	}

	public function build () {
		
	}

	public function execute () {

	}

	public function buildSql() {
		echo $this->sqlBuilder;
	}

}
