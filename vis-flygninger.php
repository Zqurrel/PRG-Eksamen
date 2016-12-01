<?php
include("start.html");
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flygning.txt";
	$filoperasjon="r";
	$fil = fopen($filnavn,$filoperasjon);
	while($linje=fgets($fil))
	{
		if($linje != "")
		{
			$del=explode(";", $linje);
			$flightnr=$del[0];
			$fraflyplass=$del[1];
            $tilflyplass=$del[2];
            $dato=$del[3];
			
			
			print("$flightnr $fraflyplass $tilflyplass $dato  <br/>");
		}
	}
	fclose($fil);
	include("slutt.html");
?>