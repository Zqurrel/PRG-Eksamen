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

function validerFlygning()
{
	var flightnr = document.getElementById('flightnr').value;
	{
	tegn1=flightnr.substr(0,1);  /* første tegn i flightnr */
    tegn2=flightnr.substr(1,1);  /* andre tegn i flightnr */
    tegn3=flightnr.substr(2,1);  /* tredje tegn i flightnr */
	tegn4=flightnr.substr(3,1);  /* fjerde tegn i flightnr */
	tegn5=flightnr.substr(4,1);  /* femte tegn i flightnr */
	    if (tegn1 < "a" || tegn1 > "z" || tegn2 < "a" || tegn2 > "z" || tegn3 < "0" || tegn3 > "9" 
		|| tegn4 < "0" || tegn4 > "9" || tegn5 < "0" || tegn5 > "9" ) 
      {
        alert("flightnr er ikke korrekt fyllt ut");
		return false;
      }
	}
	
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
	
	var dato = document.getElementById('dato').value;
	{
	tegn1=dato.substr(0,1);  /* første tegn i dato */
    tegn2=dato.substr(1,1);  /* andre tegn i dato */
    tegn3=dato.substr(2,1);  /* tredje tegn i dato */
	tegn4=dato.substr(3,1);  /* fjerde tegn i dato */
	tegn5=dato.substr(4,1);  /* femte tegn i dato */
	tegn6=dato.substr(5,1);  /* sjette tegn i dato */
    tegn7=dato.substr(6,1);  /* syvende tegn i dato */
    tegn8=dato.substr(7,1);  /* åttende tegn i dato */
	tegn9=dato.substr(8,1);  /* niende tegn i dato */
	tegn10=dato.substr(9,1);  /* tiende tegn i dato */
	    if (tegn1 < "0" || tegn1 > "9" || tegn2 < "0" || tegn2 > "9" || tegn3 < "0" || tegn3 > "9" || tegn4 < "0" || tegn4 > "9" || /* årstall */
		tegn5 < "-" || tegn5 > "-" || tegn6 < "0" || tegn6 > "1" || tegn7 < "0" || tegn7 > "2" ||  /* bindestrek og måned */
		tegn8 < "-" || tegn8 > "-" || tegn9 < "0" || tegn9 > "3" || tegn10 < "0" || tegn10 > "9")  /* bindestrek og dato */
      {
        alert("Dato er ikke korrekt fyllt ut");
		return false;
      }
	}
  return true;
}

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