function validerFlyplassKode(kode)
{
	var bokstaver = /^[a-z]+$/; //ulovlig tegn hvis man ikke har bokstaver
	var lovlig;  
	if (kode.length !=3) // koden består ikke av 3 tegn 
	{
		lovlig=false;
	}
	else if (!kode.match(bokstaver)) // koden matcher ikke med bokstavene
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
			alert("Til flyplass er ikke korrekt fylt");

			lovlig=false;
		}
	}
  return lovlig;
}

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
	var lovlig;
    var fraFlyplass=document.getElementById("fraflyplass").value;
    var tilFlyplass=document.getElementById("tilflyplass").value;
    var feilmelding="";
		if (fraFlyplass==tilFlyplass)
		{
			alert("Du kan ikke fly til samme sted som du drar fra");
			lovlig=false;
		}
		if (lovligFraFlyplass==false)
		{
			alert("Fra flyplass er ikke korrekt fylt");
			lovlig=false;
		}
		if (lovligTilFlyplass==false)
		{
			alert("Til flyplass er ikke korrekt fylt");
			lovlig=false;
		}
	}
  return true;
}

function validerdato(inputText)
{
var dato = /^\d{4}[\-](0?[1-9]|1[012])[\-](0?[1-9]|[12][0-9]|3[01])$/; // åååå-mm-dd format  

// Match datoformatet gjennom regulære uttrykk
if(inputText.value.match(dato))
{
document.form1.text1.focus();
// '-'
var separator = inputText.value.split('-');
lseparator = separator.length;
// Pakk strengen til måned, dato og år
if (lseparator>1)
{
var dato = inputText.value.split('-');
}
var yy = parseInt(dato[0]);
var mm  = parseInt(dato[1]);
var dd = parseInt(dato[2]);
// Liste over dager hver måned
var ListeoverDager = [31,28,31,30,31,30,31,31,30,31,30,31];
if (mm==1 || mm>2)
{
if (dd>ListeoverDager[mm-1])
{
alert('Dato er ikke korrekt fylt');
return false;
}
}
if (mm==2)
{
var lyear = false;
if ( (!(yy % 4) && yy % 100) || !(yy % 400)) // modulus operator for å beregne skuddår
{
lyear = true;
}
if ((lyear==false) && (dd>=29)) 
{
alert('Datoen finnes ikke i Februar');
return false;
}
if ((lyear==true) && (dd>29))
{
alert('Datoen finnes ikke i Februar');
return false;
}
}
}
else
{
alert("Datoen er ikke korrekt fylt");
document.form1.text1.focus();
return false;
}
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
