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
  if(element==document.getElementById("flyplasskode"))
  {
    document.getElementById("melding").innerHTML="Flyplasskode skal bestå av 3 små bokstaver";
  }
  if(element==document.getElementById("flyplassnavn"))
  {
    document.getElementById("melding").innerHTML="Flyplassnavn må fylles ut";
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