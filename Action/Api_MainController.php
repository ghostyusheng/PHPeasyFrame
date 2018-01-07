<?php

require "BaseController.php";
require "ToolController.php";
require CORE_DIR . 'Lib/Steam/Input.php';

use \Core\Steam\Input;

class Api_MainController extends BaseController
{
	public function index () {
        $infos = select(
            [
				'*',
				'group_concat(lon) as lons',
				'group_concat(lat) as lats'
            ]
        )
        ->from('buoyage_info')
		->groupBy('mark_id')
		->execute ();

		$this->out ($infos->data ());
	}

	public function search () {
		
	}

	public function uploaddata() {
		$file_info = (new Input ())->upload ('file_upload');

		print_r($file_info);

		if ($file_info['status'] == 0) {
			(new ToolController ())->read ($file_info['path']);				
		}
	}
}
