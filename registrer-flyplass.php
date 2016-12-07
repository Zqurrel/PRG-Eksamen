<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="registrer-flyplass.js"></script>
<script type="text/javascript" src="valider-flyplass.js"></script>  
<script>
function validerFlyplass()
{
    var flyplasskode = document.getElementById('flyplasskode').value;
    if (flyplasskode == "") 
	{
        alert("Flyplasskode er ikke fyllt ut");
        return false;
    }
	    if (flyplasskode.length!=3) /* flyplasskode bestĆ�r ikke av 3 tegn */
	{
        alert("Flyplasskode har ikke 3 tegn");
        return false;
    }
	else
	{
	tegn1=flyplasskode.substr(0,1);  /* fĆørste tegn i flyplasskode */
    tegn2=flyplasskode.substr(1,1);  /* andre tegn i flyplasskode */
    tegn3=flyplasskode.substr(2,1);  /* tredje tegn i flyplasskode */
	    if (tegn1 < "a" || tegn1 > "z" || tegn2 < "a" || tegn2 > "z" || tegn3 < "a" || tegn3 > "z")  /* minst ett av tegnene er ulovlig */
      {
        alert("Flyplasskode har minst et utlovlig tegn");
		return false;
      }
	}
	var flyplassnavn = document.getElementById('flyplassnavn').value;
    if (flyplassnavn == "") 
	{
        alert("Flyplassnavn er ikke fyllt ut");
        return false;
    }
  return true;
}
</script>
</head>
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
     print "Du må fylle ut alle feltene!";
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
       print "Flyplasskode eksisterer allerede!";

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