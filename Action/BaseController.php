<?php

require VIEW_DIR . 'View.php';

use \Core\View\View;

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
}
