<?php

require VIEW_DIR . 'View.php';
require CORE_DIR . 'Lib/Steam/Output.php';

use \Core\View\View;
use \Core\Steam\Output;

class BaseController
{
	public $view;

	public function __construct () {
		$this->view = new View ();
	}

    public function attach ($key, $value) {
		$this->view->attach ($key, $value);
    }

	public function show ($file) {
		$this->view->show ($file);
	}

	public function out ($data) {
		(new Output ())->out ($data);
	}
}
