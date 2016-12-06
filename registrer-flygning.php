<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="valider-flygning.js"></script>
<script type="text/javascript" src="registrer-flygning.js"></script>  
<script>
function validerFlygning()
{
    var flightnr = document.getElementById('flightnr').value;
    if (flightnr == "") 
	{
        alert("Flightnr er ikke fyllt ut");
        return false;
    }
	var fraflyplass = document.getElementById('fraflyplass').value;
    if (fraflyplass == "") 
	{
        alert("Fraflyplass er ikke fyllt ut");
        return false;
    }
	var tilflyplass = document.getElementById('tilflyplass').value;
    if (tilflyplass == "") 
	{
        alert("Tilflyplass er ikke fyllt ut");
        return false;
    }
	var dato = document.getElementById('dato').value;
    if (dato == "") 
	{
        alert("Dato er ikke fyllt ut");
        return false;
    }
	else 
	{
	tegn1=dato.substr(0,1);  /* fĆørste tegn i flyplasskode */
    tegn2=dato.substr(1,1);  /* andre tegn i flyplasskode */
    tegn3=dato.substr(2,1);  /* tredje tegn i flyplasskode */
	tegn4=dato.substr(3,1);  /* tredje tegn i flyplasskode */
	tegn5=dato.substr(4,1);  /* tredje tegn i flyplasskode */
	tegn6=dato.substr(5,1);  /* fĆørste tegn i flyplasskode */
    tegn7=dato.substr(6,1);  /* andre tegn i flyplasskode */
    tegn8=dato.substr(7,1);  /* tredje tegn i flyplasskode */
	tegn9=dato.substr(8,1);  /* tredje tegn i flyplasskode */
	tegn10=dato.substr(9,1);  /* tredje tegn i flyplasskode */
	    if (tegn1 < "0" || tegn1 > "9" || tegn2 < "0" || tegn2 > "9" || tegn3 < "0" || tegn3 > "9" || tegn4 < "0" || tegn4 > "9" || tegn5 < "-" || tegn5 > "-" || tegn6 < "0" || tegn6 > "9" || tegn7 < "0" || tegn7 > "9" || tegn8 < "-" || tegn8 > "-" || tegn9 < "0" || tegn9 > "9" || tegn10 < "0" || tegn10 > "9")  /* minst ett av tegnene er ulovlig */
      {
        alert("Dato er ikke korrekt fyllt ut");
		return false;
      }
	}

  return true;
}
</script>
</head>
<h1>Registrer flygning</h1>

	<form method="post" action="registrer-flygning.php" id="PRG" name="PRG" onSubmit="return validerFlygning()"><br/>
	Flightnr: <input type="text" id="flightnr" name="flightnr" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	Fra flyplass: <input type="text" id="fraflyplass" name="fraflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    Til flyplass: <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    Dato: <input type="text" id="dato" name="dato" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<input type="submit" value="Registrer" name="registrer" id="registrer"/>
	<input type="reset" value="Nullstill" id="nullstill" 'onClick=settFokus(document.getElementById("flightnr"))'/>
	</form>
	<br>
	<div id=melding> </div>
	<br>
	<div id=feilmelding> </div> 
<?php
if(isset($_POST["registrer"])) 
{
    $flightnr=$_POST["flightnr"];
    $fraflyplass=$_POST["fraflyplass"];
    $tilflyplass=$_POST["tilflyplass"];
    $dato=$_POST["dato"];
    function validerFlightnummer($nummer)
{
     $fil="flygning.txt";
     $filoperasjon="r";
     $lesflygning=fopen($fil, $filoperasjon);
     $tilbakemelding="1";
     $nummer=trim($nummer);
     while($linje=fgets($lesflygning))
     {

         $sjekk=explode(";",$linje);
         $sjekk[0]=trim($sjekk[0]);
         
         //huskeliste: 0=flightnr 1=fraflyplass 2=tilflyplass 3=dato
         if($sjekk[0]==$nummer)
         {       
             $tilbakemelding="false";
            
         }
     }
     fclose($lesflygning);
      return $tilbakemelding;
}       

    if(!$flightnr || !$fraflyplass || !$tilflyplass || !$dato) {
        print("Alle felter må fylles ut!");
    }
    else {
        $lovlig=validerFlightnummer($flightnr);
        if ($lovlig=="false")
        {
            print "Dette flightnummeret eksisterer allerede!";
        }
        else {
    $filnavn="flygning.txt";
    $filoperasjon="a";

    $fil=fopen($filnavn,$filoperasjon);

    $linje=$flightnr . ";" . $fraflyplass . ";" . $tilflyplass . ";" . $dato . "\n";

    fwrite($fil,$linje);

    fclose($fil);

    print("<br>");
    print("Flygning registrert!");
        }

    }
}
include("slutt.html");
?>
