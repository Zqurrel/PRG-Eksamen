<?php 
	include("start.html");
?>
	<head>
	<script type="text/javascript" src="vis-avganger.js"></script> 
	</head>
	<h1>Vis avganger</h1><br/><br/>
	
	
	<h3>Angi flyplass<h3/>
	<form method="post" action="vis-avganger.php" id="PRG" name="PRG"><br/>
	<label> <span> Fra flyplass </span> <input type="text" id="fraflyplass" name="fraflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required/> </label> <br>

	
	<input type="submit" value="fortsett" id="fortsett" name="fortsett"/><br/>
	<input type="reset" value="nullstill" id="nullstill" name="nullstill" 'onClick=settFokus(document.getElementById("fraflyplass"))'/>
	</form>

	<div id="melding"></div>
		
<?php

	
	@$fraflyplass=$_POST ["fraflyplass"];
	$fraflyplass=trim($fraflyplass);
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flygning.txt";
	$filoperasjon="r";
	
	print ("Disse flygningene har avgang fra $fraflyplass <br> <br>");
	
	$fil=fopen($filnavn,$filoperasjon) or die ("Klarer ikke åpne nødvendig fil.");
	
	while ($linje=fgets($fil))
	{
		if($linje !="")
		{
			$del = explode (";", $linje);
		
			
			if($fraflyplass==$del[1]=rtrim($del[1]))
			{
				print("$del[0], $del[1], $del[2], $del[3] </br>");
			}
			
		}
	}
	
	fclose($fil); 



	include("slutt.html");
	
?>