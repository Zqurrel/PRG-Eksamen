<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="registrer-flyplass.js"></script>
<script type="text/javascript" src="valider-flyplass.js"></script>  
</head>
<h1>Registrer flyplass</h1>

	<form method="post" action="registrer-flyplass.php" id="PRG" name="PRG" onSubmit="return validerFlyplass()"><br/>
	<label> <span> Flyplasskode: </span> <input type="text" id="flyplasskode" name="flyplasskode" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<label> <span> Flyplassnavn: </span> <input type="text" id="flyplassnavn" name="flyplassnavn" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>

	
	<input type="submit" value="fortsett" id="fortsett" name="fortsett"/><br/>
	<input type="reset" value="nullstill" id="nullstill" name="nullstill" 'onClick=settFokus(document.getElementById("flyplasskode"))'/>
	
	</form>
	<div id="melding"></div>
<?php
@$fortsett=$_POST["fortsett"];
if($fortsett)
{
	$flyplasskode=$_POST ["flyplasskode"];
	$flyplassnavn=$_POST ["flyplassnavn"];
	
		
		if (!$flyplasskode ||!$flyplassnavn)
			{
				print("Begge feltene må fylles ut, takk");
			}
		else 
			{
				$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyplass.txt";
				$filoperasjon="a"; 
				
				$linje=$flyplasskode.";".$flyplassnavn."\n";
					
				$fil=fopen($filnavn, $filoperasjon);
				
				fwrite($fil,$linje);
				
				fclose($fil);
				
				print("$flyplasskode $flyplassnavn er nå registrert");
				
			}
}

	include("slutt.html")
?>