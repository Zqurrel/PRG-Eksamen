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
  return true;
}