<?php

class ToolController
{

    public function index() 
    {
        print_r('welcome !');
    }

	public function read () {
		$fp = fopen (BASE_DIR . 'data.txt', 'r');

		$title = fgets ($fp);
		echo $title;
		echo "<hr/>";
		while (!feof ($fp)) {
			$line = fgets ($fp);
			$arr  = explode (' ', $line);

			list ($id, $lon, $lat, $date, $time, $sst) = $arr;

			echo "id : $id, lon : $lon, lat : $lat, date : $date, time : $time. sst : $sst \n";
				
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
		}
	}
}
