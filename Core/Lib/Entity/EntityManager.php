<?php

namespace Core\Lib\Entity;

require 'CommandInterface.php';

class EntityManager implements CommandInterface {
	
	public function __construct (BaseEntity $entity) {
		$this->entity = $entity;
	}

	public function create ($obj, $classname = "") {
		$this->entity->create($obj, $classname);
	}
}
