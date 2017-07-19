<?php

namespace Core\Lib\Db;

abstract class SqlBuilder {
	protected $sqlBuilder;
	
	public function from ($table) {
		$this->sqlBuilder .= " from `{$table}`";

		return $this;
	}

	public function where (Array $where) {
		$key	= array_keys($where)[0];
		$value	= $where[$key]; 
		$this->sqlBuilder .= " where `{$key}` = '{$value}'";

		return $this;
	}

	public function andWhere(Array $where) {
	}

	public function orWhere(Array $where) {
	}

	private function prepareWhere (Array $where) {

	}

	public abstract function buildSql ();
}
