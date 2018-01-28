<?php

require "BaseController.php";
require "ToolController.php";
require CORE_DIR . 'Lib/Steam/Input.php';

use \Core\Steam\Input;
use \Core\Lib\Db\Pdo;

class Api_MainController extends BaseController
{
	public function index () {
		Pdo::getInstance ()->query ("SET GLOBAL group_concat_max_len=1024000;");
		Pdo::getInstance ()->query ("SET @@GROUP_CONCAT_MAX_LEN = 1024000;");

        $infos = select(
            [
				'group_concat(lon) as lons',
				'group_concat(lat) as lats',
				'mark_id'
            ]
        )
        ->from('buoyage_info')
		->where ([
			'flag' => 0
		])
		->groupBy('mark_id')
		->execute ();

		$this->out ($infos->data ());
	}

	public function getunitdetail () {
		$lon 				= $_GET['tmp_lon'];
		$lon_offset_start	= $lon - 0.03;
		$lon_offset_end 	= $lon + 0.03;
		$lat			 	= $_GET['tmp_lat'];
		$lat_offset_start	= $lat - 0.03;
		$lat_offset_end		= $lat + 0.03;

		//select * from buoyage_info where lon > 120 and lon < 120.2 and lat > 20 and lat < 37;
        $infos = select(
            [
				'*'
            ]
        )
        ->from('buoyage_info')
		->where ([
			'flag' => 0
		])
		->andWhere ("lon > {$lon_offset_start}")
		->andWhere ("lon < {$lon_offset_end}")
		->andWhere ("lat > {$lat_offset_start}")
		->andWhere ("lat < {$lat_offset_end}")
		->limit (0, 1)
		->execute ();

		$this->out ($infos->fetchOne ());
	}

	public function search () {
		$lon_start  = $_GET['lon_start'];	
		$lon_end    = $_GET['lon_end'];	
		$lat_start  = $_GET['lat_start'];	
		$lat_end    = $_GET['lat_end'];	
		$start_year = $_GET['start_year'];	
		$end_year   = $_GET['end_year'];	
		$mark_id    = $_GET['mark_id'];	

		if ($lon_start && $lon_end && $lat_start && $lat_end) {
			$infos = select(
				[
					'group_concat(lon) as lons',
					'group_concat(lat) as lats'
				]
			)
			->from('buoyage_info')
			->where ([
				'flag' => 0
			])
			->andWhere ("lon > {$lon_start}")
			->andWhere ("lon < {$lon_end}")
			->andWhere ("lat > {$lat_start}")
			->andWhere ("lat < {$lat_end}")
			->groupBy ('mark_id')
			->execute ();
		}

		if ($start_year && $end_year) {
			$infos = select(
				[
					'group_concat(lon) as lons',
					'group_concat(lat) as lats'
				]
			)
			->from('buoyage_info')
			->where ([
				'flag' => 0
			])
			->andWhere ("date_format(date, '%Y-%m') >= '{$start_year}'")
			->andWhere ("date_format(date, '%Y-%m') <= '{$end_year}'")
			->groupBy('mark_id')
			->execute ();
		}

		if ($mark_id) {
			$infos = select(
				[
					'group_concat(lon) as lons',
					'group_concat(lat) as lats'
				]
			)
			->from('buoyage_info')
			->where ([
				'flag'		=> 0
			])
			->andWhere ("mark_id = '{$mark_id}'")
			->groupBy('mark_id')
			->execute ();
		}

		$this->out ($infos->data ());
	}

	public function get_data_year_month () {
        $year_mons = select(
            [
				'date_format(date,"%Y-%m") as year_mon_types'
            ]
        )
        ->from('buoyage_info')
		->groupBy ('date_format(date, "%Y-%m")')
		->execute ();

		$this->out ($year_mons->data ());
	}

	public function get_data_id_types () {
        $year_mons = select(
            [
				'mark_id'
            ]
        )
        ->from('buoyage_info')
		->groupBy ('mark_id')
		->execute ();

		$this->out ($year_mons->data ());
	}

	public function uploaddata() {
		$file_info = (new Input ())->upload ('file_upload');

		print_r($file_info);

		if ($file_info['status'] == 0) {
			(new ToolController ())->read ($file_info['path']);				
		}
	}
}
