<?php 
	include("start.html")
?>
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
        print("Alle feltene må fylles ut");
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
        print "Flyruten finnes allerede";
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
    print("Flyrute fra $fraflyplass til $tilflyplass er registrert");
    }
    }
}
?>
<p><b>Flyruter fra denne flyplassen:</b><p>
<p id="ajaxmelding">Skriv inn flyplasskode i "Fra flyplass" og få en oversikt over flyrutene fra denne flyplassen.</p>
<?php
include("slutt.html");
?>
