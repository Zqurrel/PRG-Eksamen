<?php
        $tekst=$_GET["tekst"];

        if($tekst) {

$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\146814/flyrute.txt";
$filoperasjon="r";
$fil=fopen($filnavn,$filoperasjon);

        while($linje=fgets($fil)) {

            $del=explode(";","$linje");

            $del[1] = rtrim($del[1]);

            if($tekst==$del[0]) {

            print("Fra $del[0] til $del[1]<br>");
            
        }
        }
        fclose($fil);
        }

?>