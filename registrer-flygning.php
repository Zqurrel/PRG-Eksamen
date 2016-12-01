<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="valider-flygning.js"></script>
<script type="text/javascript" src="registrer-flygning.js"></script>  
</head>
<h1>Registrer flygning</h1>

	<form method="post" action="registrer-flygning.php" id="PRG" name="PRG" onSubmit="return validerFlygning()"><br/>
	<label> <span> Flightnr: </span> <input type="text" id="flightnr" name="flightnr" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<label> <span> Fra flyplass: </span> <input type="text" id="fraflyplass" name="fraflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    <label> <span> Til flyplass: </span> <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    <label> <span> Dato: </span> <input type="text" id="dato" name="dato" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>

	<input type="submit" value="fortsett" id="fortsett" name="fortsett"/><br/>
	<input type="reset" value="nullstill" id="nullstill" name="nullstill" 'onClick=settFokus(document.getElementById("flightnr"))'/>
	
	</form>
	<div id="melding"></div>
<?php
@$fortsett=$_POST["fortsett"];
if($fortsett)
{
	$flightnr=$_POST ["flightnr"];
	$fraflyplass=$_POST ["fraflyplass"];
    $tilflyplass=$_POST ["tilflyplass"];
	$dato=$_POST ["dato"];
	
		
		if (!$flightnr ||!$tilflyplass || !$tilflyplass || !$dato )
			{
				print("Alle feltene må fylles ut, takk");
			}
		else 
			{
				$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flygning.txt";
				$filoperasjon="a"; 
				
				$linje=$flightnr.";".$fraflyplass.";".$tilflyplass.";".$dato."\n";
					
				$fil=fopen($filnavn, $filoperasjon);
				
				fwrite($fil,$linje);
				
				fclose($fil);
				
				print("$flightnr $fraflyplass $tilflyplass $dato er nå registrert");
				
			}
}

	include("slutt.html")
?>