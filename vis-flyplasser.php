	<?php
include("start.html");
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyplass.txt";
	$filoperasjon="r";
	$fil = fopen($filnavn,$filoperasjon);
	while($linje=fgets($fil))
	{
		if($linje != "")
		{
			$del=explode(";", $linje);
			$flyplasskode=$del[0];
			$flyplassnavn=$del[1];
			
			
			print("$flyplasskode $flyplassnavn  <br/>");
		}
	}
	fclose($fil);
	include("slutt.html");
?>