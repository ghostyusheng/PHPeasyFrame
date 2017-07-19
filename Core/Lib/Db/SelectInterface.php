<?php

namespace Core\Lib\Db;

interface SelectInterface {
	
	public function execute();		

	public function select(Array $fields);

	public function build();
}
