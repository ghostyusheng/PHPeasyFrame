<?php

namespace Core\Lib\Db;

require_once 'SqlBuilder.php';
require_once 'DeleteInterface.php';

class DeleteBuilder extends SqlBuilder implements DeleteInterface {

	public function delete ($table) {
		$this->sqlBuilder .= "delete from `{$table}`";

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
