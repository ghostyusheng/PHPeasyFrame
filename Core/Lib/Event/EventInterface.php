<?php

namespace Core\Event;

interface EventInterface {
	public function getListens () ;
	public function removeAll () ;
}
