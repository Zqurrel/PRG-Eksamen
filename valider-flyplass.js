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