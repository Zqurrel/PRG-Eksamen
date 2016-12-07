function ajax(tekst) {
    var foresporsel=new XMLHttpRequest ();

    foresporsel.onreadystatechange=function() {
        if(foresporsel.readyState==4 && foresporsel.status==200) {
            document.getElementById("ajaxmelding").innerHTML=foresporsel.responseText;
        }
    }
    foresporsel.open("GET","ajax.php?tekst="+tekst);
    foresporsel.send();
}