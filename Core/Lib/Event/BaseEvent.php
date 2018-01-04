<?php

namespace Core\Event;

require 'AbstractEvent.php';

use \Core\Event\AbstractEvent;

class BaseEvent extends AbstractEvent {

	protected static $listens;

	public static function listen($event, $callback, $once = false)
	{
		if (!is_callable($callback)) {
			return false;
		}

		self::$listens[$event][] = [
			'callback' => $callback,
			'once'	   => $once
		];

		return true;
	}

	public static function remove ($event, $index = null) {
		if (is_null($index)) {
			unset(self::$listens[$event]);

			return true;
		}

		unset(self::$listens[$event][$index]);
	}

	public static function trigger()
	{
		$argc = func_num_args();	
		$args = func_get_args();

		if (!$argc) {
			return;
		}

		$event = array_shift($args);

		if (!isset(self::$listens[$event])) {
			return false;
		}

		foreach (self::$listens[$event] as $index => $listen) {
			$callback = $listen['callback'];
			$listen['once'] && self::remove($event, $index);
			call_user_func_array($callback, $args);
		}
	}
}
