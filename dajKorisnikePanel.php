<?php

	$con = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
    $con->exec("set names utf8");
    $lista_vijesti = $con->query("select id, ime, prezime from korisnik where tip like 'korisnik'");
    if (!$lista_vijesti) {
          $error = $con->errorInfo();
          print $error[2];
          exit();
     }
     
     print("<ul id = 'lista_korisnika'>");

     foreach($lista_vijesti as $korisnik) {
        $id = $korisnik['id'];
        $ime = $korisnik['ime'];
        $prezime = $korisnik['prezime'];

        print("<div class='red_liste_korisnika'><li>".$ime." ".$prezime."<img class='panel_ikona_brisi' src='slike/greska.png' onclick='brisiKorisnika(".$id.");'></li></div>"); 
     }

     print("</ul>");



?>