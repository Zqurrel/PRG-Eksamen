<?php 
	include("start.html")
?>
<head>
<script type="text/javascript" src="registrer-flyrute.js"></script>
<script type="text/javascript" src="valider-flyrute.js"></script> 
<script type="text/javascript" src="ajax.js"></script>
<script>
function validerFlyplassKode(kode)
{
	var bokstaver = /^[a-z]+$/;
	var lovlig;  
	if (kode.length !=3) 
	{
		lovlig=false;
	}
	else if (!kode.match(bokstaver))
	{
		lovlig=false;
	}
  return lovlig;
}
function validerFlyrute()
{
    var lovlig;
    var fraFlyplass=document.getElementById("fraflyplass").value;
    var tilFlyplass=document.getElementById("tilflyplass").value;
    var feilmelding="";
		if (fraFlyplass==tilFlyplass)
		{
			alert("Du kan ikke fly til samme sted som du drar fra");
			lovlig=false;
		}
	else 
	{
		var lovligFraFlyplass=validerFlyplassKode(fraFlyplass);
		var lovligTilFlyplass=validerFlyplassKode(tilFlyplass);
		
		if (lovligFraFlyplass==false)
		{
			alert("Fra flyplass er ikke korrekt fylt");

			lovlig=false;
		}
		if (lovligTilFlyplass==false)
		{
			alert("Til flyplass har er ikke korrekt fylt");

			lovlig=false;
		}
	}
  return lovlig;
}
</script>
</head>
<h1>Registrer flyrute</h1>

	<form method="post" action="registrer-flyrute.php" id="PRG" name="PRG" onSubmit="return validerFlyrute()"><br/>
	Fra flyplass: <input type="text" name="fraflyplass" id="fraflyplass" placeholder="Skriv her" onFocus="fokus(this)" onBlur="mistetFokus (this)"  onMouseOver="musInn(this)" onmouseout="musUt()" onmouseover="musIn(fraflyplass)" onkeyup="ajax(this.value)" required /> </label> <br>
	Til flyplass: <input type="text" id="tilflyplass" name="tilflyplass" placeholder="Skriv her"  onFocus="fokus(this)" onBlur="mistetFokus (this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required /> </label> <br>
	<input type="submit" value="Registrer" name="registrer" id="registrer">
    <input type="reset" value="Nullstill" id="nullstill">
    </form>
    <br>
	<div id=melding> </div>
	<br>
	<div id=feilmelding> </div> 
<?php
if(isset($_POST["registrer"])) {
    $fraflyplass=$_POST["fraflyplass"];
    $tilflyplass=$_POST["tilflyplass"];

    if(!$fraflyplass || !$tilflyplass) {
        print("Alle felter må fylles ut!");
    }
    else {

        function validerUnik()
        {
            global $fraflyplass,$tilflyplass;
            $fil="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyrute.txt";
            $filoperasjon="r";
            $lesfil=fopen($fil, $filoperasjon);
            $tilbakemelding="1";
            $fraflyplass=trim($fraflyplass);
            $tilflyplass=trim($tilflyplass);
            while($linje=fgets($lesfil))
            {
                $sjekk=explode(";",$linje);
                $sjekk[0]=trim($sjekk[0]);
                $sjekk[1]=trim($sjekk[1]);
         
                //huskeliste: 0=fraflyplass 1=tilflyplass
                if($sjekk[0]==$fraflyplass && $sjekk[1]==$tilflyplass)
         {       
             $tilbakemelding="false";
           
         }
     }
     fclose($lesfil);
      return $tilbakemelding;
        }
    $lovlig=validerUnik();
    if ($lovlig=="false")
    {
        print "Denne flyruten eksisterer allerede!";
    }
    else
    {   
    $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyrute.txt";
    $filoperasjon="a";

    $fil=fopen($filnavn,$filoperasjon);

    $linje=$fraflyplass . ";" . $tilflyplass . "\n";

    fwrite($fil,$linje);

    fclose($fil);

    print("<br>");
    print("Flyrute fra $fraflyplass til $tilflyplass registrert!");
    }
    }
}
?>
<p><b>Flyruter fra denne flyplassen:</b><p>
<p id="ajaxmelding">Skriv inn flyplasskode i "Fra flyplass" og få en oversikt over flyrutene fra denne flyplassen.</p>
<?php
include("slutt.html");
?>