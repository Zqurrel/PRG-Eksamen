function fokus(element)
{
  element.style.background ="yellow";
}
function mistetFokus(element)
{
  element.style.background="white";
}
function musInn(element)
{
  if(element==document.getElementById("flightnr"))
  {
    document.getElementById("melding").innerHTML="Flightnr skal bestå av 2 små bokstaver og 3 tall";
  }
  if(element==document.getElementById("fraflyplass"))
  {
    document.getElementById("melding").innerHTML="Fra flyplass skal bestå av 3 små bokstaver";
  }
  if(element==document.getElementById("tilflyplass"))
  {
    document.getElementById("melding").innerHTML="Til flyplass skal bestå av 3 små bokstaver";
  }
  if(element==document.getElementById("dato"))
  {
    document.getElementById("melding").innerHTML="Dato skal skrives ÅÅÅÅ-MM-DD";
  }
}
function musUt(element)
{
  document.getElementById("melding").innerHTML="";
}

function settfokus(element)
{
  element.focus();
}