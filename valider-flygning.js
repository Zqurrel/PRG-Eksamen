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
	//regel på tegn i flightnr
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
			alert("Til flyplass har er ikke korrekt fylt");
			lovlig=false;
		}
	}
  return true;
}
function validerdato(inputText)
{
var datoformat = /^\d{4}[\-](0?[1-9]|1[012])[\-](0?[1-9]|[12][0-9]|3[01])$/;

// Match the date format through regular expression
if(inputText.value.match(datoformat))
{
document.form1.text1.focus();
//Test which seperator is used '/' or '-'
var split = inputText.value.split('-');
seperator2 = split.length;
// Extract the string into month, date and year
if (seperator2>1)
{
var dato = inputText.value.split('-');
}
var yy = parseInt(dato[0]);
var mm  = parseInt(dato[1]);
var dd = parseInt(dato[2]);
//  Liste av dager i måneden 
var listeavdager = [31,28,31,30,31,30,31,31,30,31,30,31];
if (mm==1 || mm>2)
{
if (dd>listeavdager[mm-1])
{
alert('Dato er ikke korrekt fylt');
return false;
}
}
if (mm==2)
{
var forsteaar = false;
if ( (!(yy % 4) && yy % 100) || !(yy % 400)) // modulus operator
{
forsteaar = true;
}
if ((forsteaar==false) && (dd>=29)) //år false og antall dager over 29
{
alert('Datoen finnes ikke i Februar');
return false;
}
if ((forsteaar==true) && (dd>29)) //år true og antall dager over 29
{
alert('Datoen finnes ikke i Februar');
return false;
}
}
}
else
{
alert("Dato er ikke korrekt fylt");
document.form1.text1.focus();
return false;
}
}
