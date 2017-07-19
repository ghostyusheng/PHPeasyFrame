<?php

require_once __DIR__ . '/../Lib/Db/SelectBuilder.php';
require_once __DIR__ . '/../Lib/Db/UpdateBuilder.php';
require_once __DIR__ . '/../Lib/Db/DeleteBuilder.php';

function select ($fields) {
	$builder =  new \Core\Lib\Db\SelectBuilder();
	
	return $builder->select($fields);
}

function update ($field) {
	$builder =  new \Core\Lib\Db\UpdateBuilder();
	
	return $builder->update($field);
}

function delete ($table) {
	$builder =  new \Core\Lib\Db\DeleteBuilder();
	
	return $builder->delete($table);
}
