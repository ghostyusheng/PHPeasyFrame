<?php

class SelectBuilder extends SqlBuilder implements selectInterface {	

	public function select (Array $fields) {
		$fields = implode(',', $fields);
		$this->sqlBuilder += "select {$fields}";

		return $this;
	}

	public function build () {
		
	}
}
