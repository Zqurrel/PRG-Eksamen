<?php 
	include("start.html")
?>
<h1>Registrer flyplass</h1>

	<form method="post" action="registrer-flyplass.php" id="PRG" name="PRG" onSubmit="return validerFlyplass()"><br/>
	Flyplasskode: <input type="text" id="flyplasskode" name="flyplasskode" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	Flyplassnavn: <input type="text" id="flyplassnavn" name="flyplassnavn" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<input type="submit" value="Registrer" name="registrer" id="registrer"/>
	<input type="reset" value="Nullstill" id="nullstill" 'onClick=settFokus(document.getElementById("flyplasskode"))'/>
	</form>
	<br>
	<div id=melding> </div>
	<br>
	<div id=feilmelding> </div> 
<?php
@$registrer=$_POST["registrer"];
if ($registrer)
  {

    $flyplasskode=$_POST["flyplasskode"];
    $flyplassnavn=$_POST["flyplassnavn"];

    if (!$flyplasskode || !$flyplassnavn)
    {
     print "Alle feltene må fylles ut";
    }

else
   {
     
     function validerFlyplass($flyplass)
{
     $fil="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyplass.txt";
     $filoperasjon="r";
     $lesflyplass=fopen($fil, $filoperasjon);
     $tilbakemelding="1";
     $flyplass=trim($flyplass);
     while($linje=fgets($lesflyplass))
     {

         $sjekk=explode(";",$linje);
         $sjekk[0]=trim($sjekk[0]);
         
         //huskeliste: 0=flyplasskode 1=flyplassnavn
         if($sjekk[0]==$flyplass)
         {       
             $tilbakemelding="false";
         }
     }
     fclose($lesflyplass);
      return $tilbakemelding;
}
     $lovlig=validerFlyplass($flyplasskode);
     if ($lovlig=="false")
     {
       print "Flyplasskode finnes allerede";

     }
     else
     {
    $regflyfil="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyplass.txt";
     $filoperasjon="a";
     $linje=$flyplasskode . " ; " . $flyplassnavn . "\n";
     $regflyfil=fopen($regflyfil, $filoperasjon);
     fwrite ($regflyfil, $linje);
     fclose ($regflyfil);
     print "Flyplass $flyplassnavn er registrert med flyplasskode $flyplasskode";
       

     }
   }
  }

include("slutt.html");
?>
