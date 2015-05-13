<?php
    $files = glob('novosti/*.txt', GLOB_BRACE);
    $niz = array();
    foreach($files as $file) {
        $sadrzaj = file($file);
        array_push($niz, $sadrzaj);
    }
    
    for($i = 0; $i < count($niz); $i++) {
        for($j = 0; $j < count($niz); $j++) {
            if(strtotime($niz[$i][0]) > strtotime($niz[$j][0])) {
                $tren = $niz[$i];
                $niz[$i] = $niz[$j];
                $niz[$j] = $tren;
            }
        }
    }

    $a = DateTime::createFromFormat('H:i:s', "10:31:44");
    foreach ($niz as $clan) {
        $datum = $clan[0];
        $autor = $clan[1];
        $naslov = $clan[2];
        $slika = $clan[3];
        $tekst = "";
        $detaljno = "";
        $istina = true;
        for($i = 4; $i < count($clan); $i++) {
            if(trim($clan[$i]) === "--") {
                $istina = false;
            }

            if($istina) {
                $tekst = $tekst." ".$clan[$i];
            }

            else {
                if(trim($clan[$i]) != "--") {
                    $detaljno = $detaljno." ".$clan[$i];
                }
            }
        }
        if(trim($slika) === "") {
            $slika = "slike/prazno.png";
        }
        print("<div class = 'item'>
            <img src ='".$slika."' alt = 'pr_slika'>
            <h3>".$naslov."</h3>
            <p class = 'datum'> Datum: ".$datum."</p>
            <p class 'sazetak'>".$tekst."<a href = '#'>Detaljnije</a></p>
            </div>");
    }
?>