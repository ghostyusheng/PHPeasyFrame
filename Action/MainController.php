<?php

require "BaseController.php";

class MainController extends BaseController
{
	public function index () {
		$this->attach ('aaa', 'bbb');
		$this->show ('Index\index');
	}
}
