<?php

class ToolController
{

    public function index() 
    {
        print_r('welcome !');
    }

	public function read ($path) {
		$fp = fopen (BASE_DIR . 'data.txt', 'r');

		if ($path) {
			$fp = fopen ($path, "r");
		}

		$title = fgets ($fp);
		echo $title;
		echo "<hr/>";
		while (!feof ($fp)) {
			$line = fgets ($fp);
			$arr  = explode (' ', $line);

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
