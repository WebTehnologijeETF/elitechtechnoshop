<?php
		$greskaMail = $greskaSifra =  " ";
        $email = $sifra  = "";
        $ikonicaMail =$ikonicaSifra = "";

        $validno = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = htmlentities($_POST['mail'], ENT_QUOTES);
            $sifra = htmlentities($_POST['pass'], ENT_QUOTES);


            $veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
            $sql = $veza->prepare("select password, tip from korisnik where email = ?");
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
            elseif($sql->rowCount() == 0) {
                $greskaMail = "Taj mail nije registrovan!";
                $ikonicaMail = "slike/greska.png";
                $validno = false;
            }
            else {
                $ikonicaMail = "slike/prazno.png";
            }

            $password = $sql->fetchAll();
            $pass_hashed = $password[0]['password'];

            if($pass_hashed != md5($sifra)) {
                $greskaSifra = "Sifra ne odgovara mailu!";
                $ikonicaSifra = "slike/greska.png";
                $validno = false;
            }
            else {
                $ikonicaSifra = "slike/prazno.png";
            }            
        }

if(!$validno) {
    print("<form id = 'sign_in_form'>
                <div id = 'sup_d1'>
                    <label for='mail'>E-mail:</label>
                    <input id='mail' type='text' name='mail_in'>
                    <img class = 'greska_icon' id ='greska_mail' src = '".$ikonicaMail."' alt = 'greska_pic'>
                    <p class = 'greska_tekst' id ='greska_tekst_mail'>".$greskaMail."</p>
                </div>
                <div id = 'sup_d2'>
                    <label for='pass'>Password:</label>
                    <input id='pass' type='password' name='pass_in'>
                    <img class = 'greska_icon' id ='greska_pass' src = '".$ikonicaSifra."' alt = 'greska_pic'>
                    <p class = 'greska_tekst' id ='greska_tekst_pass'>".$greskaSifra."</p>
                </div>
                
                <div id = 'sup_d6'>
                    <label></label>
                    <input id ='sup_sbmt' type='button' onclick='logujKorisnika(this.form);' value='Prijavi se'>
                </div>
            </form>");
}

else {
    session_start();
    $_SESSION['tip_korisnika'] = $password[0]['tip'];
    print("<h2>Uspješno ste se logirali</h2>");
    if($_SESSION['tip_korisnika'] == "administrator") {
    print("<h4>Dodavanje novosti se radi na pocetnoj stranici, iznad samih vijesti.<br>
        Promjena i brisanje nisu uradjeni.<br>
        Brisanje komentara se radi na samim komentarima, klikom na crveni X pored</h4>");
    }
}

?>