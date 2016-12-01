function validerFlyplass()
{
	var flyplassnavn=document.getElementById("flyplassnavn").value; 
	var flyplasskode=document.getElementById("flyplasskode").value;
	
	var feilmelding="";
	
	if(!flyplassnavn)
	{
		feilmelding="Flyplassnavn er ikke korrekt utfyllt </br>";
	}
	if(!flyplasskode)
	{
		feilmelding=feilmelding +"Flyplasskode er ikke korrekt utfylt </br>";
	}
	
	if(flyplassnavn && flyplasskode)
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