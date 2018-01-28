<?php

class ToolController
{

    public function index() 
    {
        print_r('welcome !');
    }

	public function read ($path = '') {
		$fp = fopen (BASE_DIR . 'new_data/0301.txt', 'r');

		if ($path) {
			$fp = fopen ($path, "r");
		}

		$title = fgets ($fp);
		echo $title;
		echo "<hr/>";
		while (!feof ($fp)) {
			$line = fgets ($fp);
			$arr  = explode ("\t", $line);

			if (!isset ($arr[1])) {
				$arr = explode (" ", $line);
			}

			if (count ($arr) == 6) {
				$id = $arr[0];
				$lon = $arr[1];
				$lat = $arr[2];
				$date = $arr[3];
				$time = $arr[4];
				$sst = $arr[5];

				insert('buoyage_info')
				->values(
					[
						'mark_id' => $id,
						'lon'     => $lon,
						'lat'     => $lat,
						'date'    => $date . ' ' . $time,
						'sst'     => $sst
					]
				)
				->execute ();

				echo "id : $id, lon : $lon, lat : $lat, date : $date, time : $time. sst : $sst <br>";
			}
		}
	}

	public function readdir () {
		$dir  = BASE_DIR . 'new_data/';
		$d    = dir($dir);
		$txts = [];

		while (false !== ($entry = $d->read())) {
			if (end (explode ('.', $entry)) == 'txt') {
				$txts[] = $dir . $entry;
			}
		}
		$d->close();

		foreach ($txts as $txt) {
			$fp = fopen ($txt, 'r');
			$title = fgets ($fp);
			echo $title;
			while (!feof ($fp)) {
				$line = fgets ($fp);
				$line = str_replace (' ', "\t", $line);
				$arr  = explode ("\t", $line);
				
				if (!isset ($arr[1])) {
					$arr = explode (" ", $line);
				}

				if (count ($arr) == 6) {
					$id = $arr[0];
					$lon = $arr[1];
					$lat = $arr[2];
					$date = $arr[3];
					$time = $arr[4];
					$sst = $arr[5];

					insert('buoyage_info')
					->values(
						[
							'mark_id' => $id,
							'lon'     => $lon,
							'lat'     => $lat,
							'date'    => $date . ' ' . $time,
							'sst'     => $sst
						]
					)
					->execute ();

					echo "id : $id, lon : $lon, lat : $lat, date : $date, time : $time. sst : $sst <br>";
				}
			}
		}
	}
}
