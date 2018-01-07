<?php

require "BaseController.php";

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

}
