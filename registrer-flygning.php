<?php 
	include("start.html")
?>

<h1>Registrer flygning</h1>

	<form method="post" action="" id="PRG" name="form1" onSubmit="return validerFlygning()"> 
	Flightnr: <input type="text" id="flightnr" name="flightnr" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	Fra flyplass: <input type="text" id="fraflyplass" name="fraflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    Til flyplass: <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
    Dato: <input type="text" id="dato" name="text1" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<input type="submit" value="Registrer" name="registrer" id="registrer" onclick="return validerdato(document.form1.text1)"/>
	<input type="reset" value="Nullstill" id="nullstill" />
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
    $text1=$_POST["text1"];
    function validerFlightnummer($nummer)
{
     $fil="D:\\sites\\home.hbv.no\\phptemp\\web-prg10v09/flygning.txt";
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
    if(!$flightnr || !$fraflyplass || !$tilflyplass || !$text1) {
        print("Alle felter må fylles ut!");
    }

	else if ($fraflyplass == $tilflyplass) 
	{
		print ("Du kan ikke reise til samme flyplass");
	}
	
    else {
        $lovlig=validerFlightnummer($flightnr);
        if ($lovlig=="false")
        {
            print "Dette flightnummeret eksisterer allerede!";
        }
        else {
    $fil="D:\\sites\\home.hbv.no\\phptemp\\web-prg10v09/flygning.txt";
    $filoperasjon="a";
    $fil=fopen($filnavn,$filoperasjon);
    $linje=$flightnr . ";" . $fraflyplass . ";" . $tilflyplass . ";" . $text1 . "\n";
    fwrite($fil,$linje);
    fclose($fil);
    print("<br>");
    print("Flygning registrert!");
        }
    }
}
include("slutt.html");
?>
