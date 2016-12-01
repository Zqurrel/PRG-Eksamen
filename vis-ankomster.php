<?php
	include("start.html");
?>
	<head>
	<script type="text/javascript" src="vis-ankomster.js"></script> 
	</head>
	<h1>Vis ankomster</h1><br/><br/>
	
	
	<h3>Angi flyplass<h3/>
	<form method="post" action="vis-ankomster.php" id="PRG" name="PRG"><br/>
	<label> <span> Til flyplass </span> <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required/> </label> <br>

	
	<input type="submit" value="fortsett" id="fortsett" name="fortsett"/><br/>
	<input type="reset" value="nullstill" id="nullstill" name="nullstill" 'onClick=settFokus(document.getElementById("tilflyplass"))'/>
	</form>

	<div id="melding"></div>
		
<?php

	
	@$tilflyplass=$_POST ["tilflyplass"];
	$tilflyplass=trim($tilflyplass);
	
	$filnavn="D:Sites\\home.hbv.no\\phptemp\\146814/flygning.txt";
	$filoperasjon="r";
	
	print ("Disse flygningene ankommer $tilflyplass <br> <br>");
	
	$fil=fopen($filnavn,$filoperasjon) or die ("Klarer ikke åpne nødvendig fil.");
	
	while ($linje=fgets($fil))
	{
		if($linje !="")
		{
			$del = explode (";", $linje);
		
			
			if($tilflyplass==$del[2]=rtrim($del[2]))
			{
				print("$del[0], $del[1], $del[2], $del[3] </br>");
			}
			
		}
	}
	
	fclose($fil); 



	include("slutt.html");
	
?>