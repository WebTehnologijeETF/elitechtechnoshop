<!DOCTYPE html>
<html>
<head>
	    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta charset="utf-8"/>
        <meta content="utf-8" http-equiv="encoding">
        <TITLE>EliTech | Dobrodošli!</TITLE>
        <link rel="stylesheet" type="text/css" href="stil5.css">
</head>

<body id = "tijelo">

<?php
        $greskaIme = $greskaPrezime = $greskaMail = $greskaSifra = $greskaPotvrda = $greskaTelefon = " ";
        $ime = $prezime = $email = $sifra = $potvrdaSifra = $telefon = $grad = $p_broj = "";
        $ikonicaIme = $ikonicaPrezime = $ikonicaMail =$ikonicaSifra = $ikonicaPotvrda = $ikonicaTelefon = "";

        $validno = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $ime = htmlentities($_POST["ime_in"], ENT_QUOTES);
            $prezime = htmlentities($_POST['prezime_in'], ENT_QUOTES);
            $email = htmlentities($_POST['mail_in'], ENT_QUOTES);
            $sifra = htmlentities($_POST['pass_in'], ENT_QUOTES);
            $potvrdaSifra = htmlentities($_POST['pass_conf_in'], ENT_QUOTES);
            $telefon = htmlentities($_POST['tel_in'], ENT_QUOTES);
            $grad = htmlentities($_POST['grad_in'], ENT_QUOTES);
            $p_broj = htmlentities($_POST['post_broj_in'], ENT_QUOTES);


            if (trim($ime) == '') {
                $greskaIme = "Ne smije biti prazno!";
                $ikonicaIme = "slike/greska.png";
                $validno = false;
            }
            elseif(!ctype_alpha(trim($ime))) {
                $greskaIme = "Mogu biti samo slova!";
                $ikonicaIme = "slike/greska.png";
                $validno = false;
            } 
            else {
                $ikonicaIme = "slike/prazno.png";
            }


            if (trim($prezime) == '') {
                $greskaPrezime = "Ne smije biti prazno!";
                $ikonicaPrezime = "slike/greska.png";
                $validno = false;
            }
            elseif(!ctype_alpha(trim($prezime))) {
                $greskaPrezime = "Mogu biti samo slova!";
                $ikonicaPrezime = "slike/greska.png";
                $validno = false;
            } 
            else {
                $ikonicaPrezime = "slike/prazno.png";
            }

            $veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
            $sql = $veza->prepare("select ime from korisnik where email = ?");
            $sql ->bindParam(1, $id_p);

            $id_p = trim($email);

            if (!$sql->execute()) {
                $greska = $veza->errorInfo();
                print "SQL greška: " . $greska[2];
                exit();
            }

            if (trim($email) == '') {
                $greskaMail = "Ne smije biti prazno!";
                $ikonicaMail = "slike/greska.png";
                $validno = false;
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $greskaMail = "Mora biti validan mail!";
                $ikonicaMail = "slike/greska.png";
                $validno = false;
            }
            elseif($sql->rowCount() != 0) {
                $greskaMail = "Taj mail je već u upotrebi!";
                $ikonicaMail = "slike/greska.png";
                $validno = false;
            }
            else {
                $ikonicaMail = "slike/prazno.png";
            }

            if(strlen($sifra) < 6) {
                $greskaSifra = "Minimalno 6 karaktera!";
                $ikonicaSifra = "slike/greska.png";
                $validno = false;
            }
            else {
                $ikonicaSifra = "slike/prazno.png";
            }

            if($sifra != $potvrdaSifra) {
                $greskaPotvrda = "Sifre moraju biti iste!";
                $ikonicaPotvrda = "slike/greska.png";
                $validno = false;
            }
            else {
                $ikonicaPotvrda = "slike/prazno.png";
            }

            
        }

?>
<div id="page">
    
    <div id="header">
        <a onclick = "prebaci('naslovnica.html')"><img src="slike/logo.png" alt="logo_pic"></a>
            <ul class="nav_left">
                <li><a onclick = "prebaci('naslovnica.html')">Naslovnica</a></li>
                <li id = "zapr" class = "opens_menu"  onclick="prikaziMeniKatalog();" onmouseleave="sakrijMeniKatalog();">Katalog
                    <ul id="meni_katalog">
                        <li class = "menu_item_katalog"><a onclick = "prebaci('katalog.html')">Laptopi</a></li>
                        <li class = "menu_item_katalog">Televizori</li>
                        <li class = "menu_item_katalog">Mobiteli</li>
                        <li class = "menu_item_katalog">Tableti</li>
                    </ul>
                </li>
                <li><a onclick = "prebaci('partneri.html')">Partneri</a></li>
                <li><a onclick = "prebaci('kontakt.html')">Kontakt</a></li>
            </ul>
            <ul class="nav_right">
                <li id="act"><a onclick = "prebaci('registracija.html')">Registracija</a></li>
                <li><a onclick = "prebaci('prijava.html')">Prijava</a></li> 
            </ul>
    </div>
    <div id="wrapper">
        <div id="content">
            <h3 id="form_heading">Registrujte se!</h3>
            <?php
                if($validno) {
                    print("<br>");
                    print("<h4>Provjerite da li ste ispravno popunili kontakt formu:</h4>");
                    print("<ul id = 'uneseni_podaci'>
                        <li><p>Ime:".$ime."</li>
                        <li><p>Prezime: ".$prezime."</p></li>
                        <li><p>E-mail: ".$email."</p></li>
                        <li><p>Sifra: &middot&middot&middot&middot&middot&middot</p></li>
                        <li><p>Potvrda sifre: &middot&middot&middot&middot&middot&middot</p></li>
                        <li><p>Grad: ".$grad."</p></li>
                        <li><p>Postanski broj: ".$p_broj."</p></li>
                        <li><p>Telefon: ".$telefon."</p></li>
                        </ul>");
                    print("<h4>Da li ste sigurni da želite poslati ove podatke?</h4>");
                    $podaci = $ime.",".$prezime.",".$email.",".$sifra.",".$potvrdaSifra.",".$grad.",".$p_broj.",".$telefon;
                    
                    print("<a href='salji_mail.php?podaci=".$podaci."'><input id = 'siguran' type='submit' value = 'Siguran sam'></a>");
                    print("<h4>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke.</h4>");
                }
            ?>
            <form id = "sign_up_form" action="reg_up.php" method="POST">
                <div id = "sup_d1">
                    <label for="ime">Ime*:</label>
                    <input id="ime" type="text" name="ime_in" value="<?php echo $ime;?>">
                    <?php print("<img class = 'gr_icon' id ='greska_ime' src = ".($ikonicaIme)." alt = 'greska_pic'> <p class = 'gr_tekst' id ='greska_tekst_ime'>".$greskaIme."</p>");
                    ?>
                </div>
                <div id = "sup_d2">
                    <label for="prezime">Prezime*:</label>
                    <input id="prezime" type="text" name="prezime_in" value="<?php echo $prezime;?>">
                    <?php print("<img class = 'gr_icon' id ='greska_prezime' src = ".($ikonicaPrezime)." alt = 'greska_pic'> <p class = 'gr_tekst' id ='greska_tekst_prezime'>".$greskaPrezime."</p>");
                    ?>
                </div>
                <div id = "sup_d3">
                    <label for="mail">E-mail*:</label>
                    <input id="mail" type="text" name="mail_in" value="<?php echo $email;?>">
                    <?php print("<img class = 'gr_icon' id ='greska_mail' src = ".($ikonicaMail)." alt = 'greska_pic'> <p class = 'gr_tekst' id ='greska_tekst_mail'>".$greskaMail."</p>");
                    ?>
                </div>
                <div id = "sup_d4">
                    <label for="pass">Šifra*:</label>
                    <input id="pass" type="password" name="pass_in" value="<?php echo $sifra;?>">
                    <?php print("<img class = 'gr_icon' id ='greska_sifra' src = ".($ikonicaSifra)." alt = 'greska_pic'> <p class = 'gr_tekst' id ='greska_tekst_sifra'>".$greskaSifra."</p>");
                    ?>
                </div>
                <div id = "sup_d5">
                    <label for="conf_pass">Potvrdite šifru*:</label>
                    <input id="conf_pass" type="password" name="pass_conf_in" value="<?php echo $potvrdaSifra;?>">
                    <?php print("<img class = 'gr_icon' id ='greska_potvrda' src = ".($ikonicaPotvrda)." alt = 'greska_pic'> <p class = 'gr_tekst' id ='greska_tekst_potvrda'>".$greskaPotvrda."</p>");
                    ?>
                </div>
                <div id = "sup_d7">
                    <label for="grad">Grad stanovanja:</label>
                    <input id="grad" type="text" name="grad_in" value="<?php echo $grad;?>">
                </div>
                <div id = "sup_d9">
                    <label for="post_broj">Postanski broj:</label>
                    <input id="post_broj" type="text" name="post_broj_in" value="<?php echo $p_broj;?>">
                    <img class = "greska_icon" id ="greska_post_broj" src = "slike/greska.png" alt = "greska_pic">
                    <p class = "greska_tekst" id ="greska_tekst_post_broj">Grad i postanski broj se ne poklapaju!</p>
                </div>
                <div id = "sup_d8">
                    <label for="br_tel">Broj telefona:</label>
                    <input id="br_tel" type="text" name="tel_in" value="<?php echo $telefon;?>">
                </div>
                <div id = "sup_d6">
                    <label></label>
                    <input id ="sup_sbmt" type="submit" value="Registruj se">
                </div>
                <div id = "sup_d10">
                    <br><br>
                    <label></label>
                    <input id ="sup_rst" type="reset" value="Resetuj formu" onclick = "resetujFormuRegistracija();">
                </div>
            </form>
            <br>
            <br>
            <h6>*Obavezna polja</h6>
            <div id="mjestoPBprovjera"></div>
        </div>
    </div>

</div>

<div id="footer">
	<div class = "b_cont">
            <p id ="top">Pratite nas na društvenim mrežama</p>
            <ul class = "sn_icons">
                <li><a href="#"><img src="slike/facebook_r.png" alt="fb logo"></a></li>
                <li><a href="#"><img src="slike/twitter_r.png"  alt="tw logo"></a></li>
                <li><a href="#"><img src="slike/google_r.png"  alt="gp logo"></a></li>
            </ul>
            <p>Copyright &copy; 2015. EliTech d.o.o.</p>

    </div>
</div>
<script src = "skripta5.js"></script>
</body>
</html>