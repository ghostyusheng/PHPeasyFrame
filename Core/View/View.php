<?php

namespace Core\View;

class View
{
	public $instance;

	protected $data = [];

	public static function getInstance () {
		if ($this->instance) {
			return $this->instance;
		}

		$this->instance = new self ();
		return $this->instance;
	}

	public function show ($file) {
		$file     = str_replace ('\\', '/', $file);
		$path	  = TPL_DIR . $file . '.phtml';

		extract ($this->data);

		include $path;
	}

	public function attach ($key, $value) {
		$this->data [$key] = $value;	
	}
}
