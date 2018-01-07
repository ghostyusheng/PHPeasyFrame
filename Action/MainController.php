<?php

require "BaseController.php";

class MainController extends BaseController
{
	public function index () {
		$this->show ('Index\index');
	}

}
