<?php
include("start.html");
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyrute.txt";
	$filoperasjon="r";
	$fil = fopen($filnavn,$filoperasjon);
	while($linje=fgets($fil))
	{
		if($linje != "")
		{
			$del=explode(";", $linje);
			$fraflyplass=$del[0];
			$tilflyplass=$del[1];
			
			
			print("$fraflyplass $tilflyplass <br/>");
		}
	}
	fclose($fil);
	include("slutt.html");
?>
