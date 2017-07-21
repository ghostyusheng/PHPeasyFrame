<?php

namespace Core\Lib\Entity; 

require 'AbstractEntity.php';
require CORE_DIR . 'Model/BaseModel.php';

use Core\Lib\Entity\AbstractEntity;
use Core\Model\BaseModel;

class BaseEntity extends AbstractEntity {

	public function __construct () {
	}

	public function create ($obj, $classname) {
		if (!$classname) {
			$model = new BaseModel($obj);
		} else {
			$model = new $classname($obj);
		}

		$this->data[] = $model;
	}
}
