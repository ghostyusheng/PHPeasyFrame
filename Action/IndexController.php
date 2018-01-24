<?php

require "BaseController.php";

class IndexController extends BaseController
{
	public function index () {
		$this->show ('Tom\index');
	}

}
