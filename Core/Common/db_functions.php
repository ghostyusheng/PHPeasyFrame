<?php

require_once __DIR__ . '/../Lib/Db/SelectBuilder.php';
require_once __DIR__ . '/../Lib/Db/UpdateBuilder.php';

function select ($fields) {
	$builder =  new \Core\Lib\Db\SelectBuilder();
	
	return $builder->select($fields);
}

function update ($field) {
	$builder =  new \Core\Lib\Db\UpdateBuilder();
	
	return $builder->update($field);
}
