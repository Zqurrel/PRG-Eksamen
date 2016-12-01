<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="registrer-flyrute.js"></script>
<script type="text/javascript" src="valider-flyrute.js"></script>  
</head>
<h1>Registrer flyrute</h1>

	<form method="post" action="registrer-flyrute.php" id="PRG" name="PRG" onSubmit="return validerFlyrute()"><br/>
	<label> <span> Fra flyplass: </span> <input type="text" id="fraflyplass" name="fraflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<label> <span> Til flyplass: </span> <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>

	
	<input type="submit" value="fortsett" id="fortsett" name="fortsett"/><br/>
	<input type="reset" value="nullstill" id="nullstill" name="nullstill" 'onClick=settFokus(document.getElementById("fraflyplass"))'/>
	
	</form>
	<div id="melding"></div>
<?php
@$fortsett=$_POST["fortsett"];
if($fortsett)
{
	$fraflyplass=$_POST ["fraflyplass"];
	$tilflyplass=$_POST ["tilflyplass"];
	
		
		if (!$fraflyplass ||!$tilflyplass)
			{
				print("Begge feltene må fylles ut, takk");
			}
		else 
			{
				$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyrute.txt";
				$filoperasjon="a"; 
				
				$linje=$fraflyplass.";".$tilflyplass."\n";
					
				$fil=fopen($filnavn, $filoperasjon);
				
				fwrite($fil,$linje);
				
				fclose($fil);
				
				print("$fraflyplass $tilflyplass er nå registrert");
				
			}
}

	include("slutt.html")
?>