<?php

function select ($fields) {
	$builder =  new Core\Pdo\Db\SelectBuilder();
	
	return $builder->select($field);
}
