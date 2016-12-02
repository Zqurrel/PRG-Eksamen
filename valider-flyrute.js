function validerFlyrute()
{
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
  return true;
}
