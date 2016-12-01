function validerFlyrute()
{
	var fraflyplass=document.getElementById("fraflyplass").value; 
	var tilflyplass=document.getElementById("tilflyplass").value;
	
	var feilmelding="";
	
	if(!fraflyplass)
	{
		feilmelding="Fra flyplass er ikke korrekt utfyllt </br>";
	}
	if(!tilflyplass)
	{
		feilmelding=feilmelding +"Til flyplass er ikke korrekt utfylt </br>";
	}
	
	if(fraflyplass && tilflyplass)
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