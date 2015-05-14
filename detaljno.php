<?php

	$slika = htmlentities($_GET["slika"], ENT_QUOTES);
	$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
	$datum = htmlentities($_GET["datum"], ENT_QUOTES);
	$autor = htmlentities($_GET["autor"], ENT_QUOTES);
	$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
	$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);


	print("<div class = 'item'>
            <img src ='".$slika."' alt = 'pr_slika'>
            <h3>".$naslov."</h3>
            <p class = 'datum'> Datum: ".$datum."</p>
            <p class = 'autor'> Autor: ".$autor."</p>
            <p class 'sazetak'>".$tekst."</p>
            <p class 'sazetak'>".$detaljno."</p>
            </div>");
?>