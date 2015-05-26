<?php

    $con = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
    $con->exec("set names utf8");
    $lista_vijesti = $con->query("select id, naslov, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, tekst, urlSlike, detaljno from novost order by vrijeme desc");
    if (!$lista_vijesti) {
          $error = $con->errorInfo();
          print $error[2];
          exit();
     }

     foreach($lista_vijesti as $vijest) {
        $id = $vijest['id'];
        $naslov = $vijest['naslov'];
        $datum = date("d.m.Y. h:i:s", $vijest['vrijeme2']);
        $autor = $vijest['autor'];
        $tekst = $vijest['tekst'];
        $slika = $vijest['urlSlike'];
        $detaljno = $vijest['detaljno'];

        //$linkDetaljno = "";
        //if($detaljno != "" && $detaljno != null) {
            $linkDetaljno = "Detaljnije";
        //}

        $novost["id"] = $id;
        $novost["datum"] = $datum;
        $novost["slika"] = $slika;
        $novost["naslov"] = $naslov;
        $novost["autor"] = $autor;
        $novost["tekst"] = $tekst;
        $novost["detaljno"] = $detaljno;

        print("<div class = 'item'>
            <img src ='".htmlentities($slika, ENT_QUOTES)."' alt = 'pr_slika'>
            <h3>".htmlentities($naslov, ENT_QUOTES)."</h3>
            <p class = 'datum'> Datum: ".htmlentities($datum, ENT_QUOTES)."</p>
            <p class = 'autor'> Autor: ".htmlentities($autor, ENT_QUOTES)."</p>
            <p class = 'sazetak'>".htmlentities($tekst, ENT_QUOTES)."<a onclick='dajNovost(".json_encode($novost).")'>".$linkDetaljno."</a></p>
            </div>"); 
     }
?>