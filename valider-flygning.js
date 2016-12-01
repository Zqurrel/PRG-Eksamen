function validerFlygning()
{
	var flightnr=document.getElementById("flightnr").value; 
	var fraflyplass=document.getElementById("fraflyplass").value;
    var tilflyplass=document.getElementById("tilflyplass").value; 
	var dato=document.getElementById("dato").value;
	
	var feilmelding="";
	
	if(!flightnr)
	{
		feilmelding="Flightnr er ikke korrekt utfyllt </br>";
	}
	if(!fraflyplass)
	{
		feilmelding=feilmelding +"Fra flyplass er ikke korrekt utfylt </br>";
	}
	
    if(!tilflyplass)
	{
		feilmelding="Til flyplass er ikke korrekt utfyllt </br>";
	}
    if(!dato)
	{
		feilmelding="Dato er ikke korrekt utfyllt </br>";
	}

	if(flightnr && tilflyplass && tilflyplass && dato)
	{
		return true;
	}
	else
	{
		document.getElementById("melding").style.color="red";
		document.getElementById("melding").innerHTML=feilmelding;
		return false;
	}
}