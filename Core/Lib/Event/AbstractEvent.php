<?php

namespace Core\Event;

require 'EventInterface.php';

use \Core\Event\EventInterface;

abstract class AbstractEvent implements EventInterface
{
	public function getListens() {
	}	

	public function removeAll() {
	}
}
