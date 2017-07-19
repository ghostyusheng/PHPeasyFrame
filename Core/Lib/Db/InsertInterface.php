<?php

namespace Core\Lib\Db;

interface InsertInterface {
	
	public function execute();		

	public function insert($table);

	public function values(Array $values);

	public function build();
}
