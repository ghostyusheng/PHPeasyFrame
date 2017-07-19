<?php

namespace Core\Lib\Db;

interface UpdateInterface {
	
	public function execute();		

	public function update($field);

	public function build();
}
