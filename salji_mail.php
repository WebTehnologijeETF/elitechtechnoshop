<!DOCTYPE html>
<html>
<head>
	    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
        <TITLE>EliTech | Dobrodošli!</TITLE>
        <link rel="stylesheet" type="text/css" href="stil5.css">
</head>

<body id = "tijelo">
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
                <li><a id="prijavaDugme" onclick = "prebaci('prijava.html')">Prijava</a></li> 
            </ul>
    </div>
    <div id="wrapper">
        <div id="content">
            <?php
                        /*require("sendgrid-php/sendgrid-php.php");
                        $service_plan_id = "sendgrid_ab701";
                        $account_info = json_decode(getenv($service_plan_id), true);

                        $sendgrid = new SendGrid($account_info['username'], $account_info['password']);
                        $email    = new SendGrid\Email();

                        $podaci = explode(",", $_REQUEST["podaci"]);
                        $message = "Ime: " . $podaci[0] . "\r\n" . "Prezime: " . $podaci[1] . "\r\n" . "E-mail: " . $podaci[2] . "\r\n" . "Sifra: " . $podaci[3] . "\r\n" . "Grad: " . $podaci[5] . "\r\n" . "Postanski broj: " . $podaci[6] . "\r\n" . "Telefon: " . $podaci[7] . "\r\n";
                        $from = "registracija@elitech.com";
                        $subject = "Registracija forme Elitech";
                        $send_to = "zcilic1@etf.unsa.ba";
                        $send_cc = "zlatancilic693@gmail.com";

                        $email->addTo($send_to)
                              ->addCc($send_cc)
                              ->setFrom($from)
                              ->setSubject($subject)
                              ->setHtml($message);

                        
                        try {
                            $sendgrid->send($email);
                            print "<h3>Zahvaljujemo se što ste nas kontaktirali</h3>";
                        } catch(\SendGrid\Exception $error) {
                            echo $error->getCode();
                            foreach($error->getErrors() as $er) {
                                echo $er;
                            }
                        }*/

                        $conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
                        $sql = $conn->prepare("insert into korisnik (ime, prezime, email, password, grad, postanskiBroj, telefon, tip) values (?, ?, ?, md5(?), ?, ?, ?, ?)");
                        $sql ->bindParam(1, $ime);
                        $sql ->bindParam(2, $prezime);
                        $sql ->bindParam(3, $email);
                        $sql ->bindParam(4, $password);
                        $sql ->bindParam(5, $grad);
                        $sql ->bindParam(6, $postanskiBroj);
                        $sql ->bindParam(7, $telefon);
                        $sql ->bindParam(8, $tip);


                        $podaci = explode(",", $_REQUEST["podaci"]);
                        $ime = $podaci[0];
                        $prezime = $podaci[1];
                        $email = $podaci[2];
                        $password = $podaci[3];
                        $grad = $podaci[5];
                        $postanskiBroj = $podaci[6];
                        $telefon = $podaci[7];
                        $tip = "korisnik";

                        if (!$sql->execute()) {
                            $greska = $conn->errorInfo();
                            print "SQL greška: ";
                            print_r($greska);
                            exit();
                        }


            ?>
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