<?php
session_start();
	if(isset($_GET['akcija'])) {
		if($_GET['akcija'] == "upad") {
			    $id = htmlentities($_GET["id"], ENT_QUOTES);
				$slika = htmlentities($_GET["slika"], ENT_QUOTES);
				$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
				$datum = htmlentities($_GET["datum"], ENT_QUOTES);
				$autor = htmlentities($_GET["autor"], ENT_QUOTES);
				$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
				$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);

				$conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
				$sql = $conn->prepare("select * from komentar where vijest = ?");
				$sql ->bindParam(1, $id_p);

				$id_p = $id;

		        if (!$sql->execute()) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        $komentari = $sql->fetchAll();
	          	
	         	$novost["id"] = $id;
		        $novost["datum"] = $datum;
		        $novost["slika"] = $slika;
		        $novost["naslov"] = $naslov;
		        $novost["autor"] = $autor;
		        $novost["tekst"] = $tekst;
		        $novost["detaljno"] = $detaljno;

				print("<div class = 'item'>
			            <img src ='".$slika."' alt = 'pr_slika'>
			            <h3>".$naslov."</h3>
			            <p class = 'datum'> Datum: ".$datum."</p>
			            <p class = 'autor'> Autor: ".$autor."</p>
			            <p class 'sazetak'>".$tekst."</p>
			            <p class 'sazetak'>".$detaljno."</p>
			            <p><a onclick='dajKomentare(".json_encode($novost).")'>".$sql->rowCount()." komentara</a></p>
			            </div>");
		}
		if($_GET['akcija'] == "pregled") {
				
				$printajIks = false;
				
     			if($_SESSION['tip_korisnika'] == "administrator") {
     				$printajIks = true;
     			}

				$id = htmlentities($_GET["id"], ENT_QUOTES);
				$slika = htmlentities($_GET["slika"], ENT_QUOTES);
				$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
				$datum = htmlentities($_GET["datum"], ENT_QUOTES);
				$autor = htmlentities($_GET["autor"], ENT_QUOTES);
				$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
				$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);


				$novost["id"] = $id;
		        $novost["datum"] = $datum;
		        $novost["slika"] = $slika;
		        $novost["naslov"] = $naslov;
		        $novost["autor"] = $autor;
		        $novost["tekst"] = $tekst;
		        $novost["detaljno"] = $detaljno;

				print("<div class = 'item'>
			            <img src ='".$slika."' alt = 'pr_slika'>
			            <h3>".$naslov."</h3>
			            <p class = 'datum'> Datum: ".$datum."</p>
			            <p class = 'autor'> Autor: ".$autor."</p>
			            <p class 'sazetak'>".$tekst."</p>
			            <p class 'sazetak'>".$detaljno."</p>
			            </div>");

				$veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	          	$sql = $veza->prepare("select id, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentar where vijest = ? order by vrijeme asc");
		        $sql ->bindParam(1, $id_p);

				$id_p = $id;

		        if (!$sql->execute()) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        $komentari = $sql->fetchAll();
		        
		        print("<h3 id='kom_naslov'>Komentari</h3>");
		        print("<div class = 'comment_wrapper'>");

		        foreach ($komentari as $komentar) {

		        	$tekst_kom = $komentar['tekst'];
		        	$autor_kom = $komentar['autor'];
		        	$datum_kom = date("d.m.Y. h:i:s", $komentar['vrijeme2']);
		        	$email_kom = $komentar['email'];
		        	$id_kom = $komentar['id'];

					if($email_kom == "" || $email_kom == null) {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'> Autor: ".$autor_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        	else {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'>Autor: <a href='mailto:".$email_kom."'>".$autor_kom."</a></p>
			            <p class = 'email_kom'> E-mail autora: ".$email_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        }

		        print("</div>");

		        print("<div id='com_form_wrapper'>
		        	<form id='unos_komentara_form' action='' method='GET'>
		        	<label for='tekst_kom'>Komentar:</label>
		        	<textarea id='tekst_kom' name='tekst_komentara' rows='5'></textarea>
		        	<label for='ime_kom'>Ime:</label>
		        	<input type='text' id = 'ime_kom' name='ime_autora_komentara'>
		        	<label for='email_kom'>E-mail:</label>
		        	<input type='text' id='email_kom' name='email_autora_komentara'>
		        	<input type='button' id='com_sbmt' name='posalji_komentar' value='Posalji' onclick='dodajKomentar(this.form, ".json_encode($novost).")'>
		        	</form>
		        	</div>");
		       
		}
		if($_GET['akcija'] == "dodavanje") {

				$printajIks = false;
     			if($_SESSION['tip_korisnika'] == "administrator") {
     				$printajIks = true;
     			}

				$id = htmlentities($_GET["id"], ENT_QUOTES);
				$slika = htmlentities($_GET["slika"], ENT_QUOTES);
				$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
				$datum = htmlentities($_GET["datum"], ENT_QUOTES);
				$autor = htmlentities($_GET["autor"], ENT_QUOTES);
				$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
				$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);

				$novost["id"] = $id;
		        $novost["datum"] = $datum;
		        $novost["slika"] = $slika;
		        $novost["naslov"] = $naslov;
		        $novost["autor"] = $autor;
		        $novost["tekst"] = $tekst;
		        $novost["detaljno"] = $detaljno;

				print("<div class = 'item'>
			            <img src ='".$slika."' alt = 'pr_slika'>
			            <h3>".$naslov."</h3>
			            <p class = 'datum'> Datum: ".$datum."</p>
			            <p class = 'autor'> Autor: ".$autor."</p>
			            <p class 'sazetak'>".$tekst."</p>
			            <p class 'sazetak'>".$detaljno."</p>
			            </div>");

				$tk = htmlentities($_GET['tekstKomentara'], ENT_QUOTES);
				$ak = htmlentities($_GET['imeAutora'], ENT_QUOTES);
				$ea = htmlentities($_GET['emailAutora'], ENT_QUOTES);

				$conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
				$sql = $conn->prepare("insert into komentar (vijest, autor, tekst, email) values (?, ?, ?, ?)");
				$sql ->bindParam(1, $id_p);
				$sql ->bindParam(2, $ak_p);
				$sql ->bindParam(3, $tk_p);
				$sql ->bindParam(4, $ea_p);

				$id_p = $id;
				$ak_p = $ak;
				$tk_p = $tk;
				$ea_p = $ea;

				if (!$sql->execute()) {
				    $greska = $conn->errorInfo();
				   	print "SQL greška: " . $greska[2];
				   	exit();
				}

				$veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	          	$sql = $veza->prepare("select id, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentar where vijest = ? order by vrijeme asc");
		        $sql ->bindParam(1, $id_p);

				$id_p = $id;

		        if (!$sql->execute()) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        $komentari = $sql->fetchAll();

		        print("<h3 id='kom_naslov'>Komentari</h3>");
		        print("<div class = 'comment_wrapper'>");

		        foreach ($komentari as $komentar) {

		        	$tekst_kom = $komentar['tekst'];
		        	$autor_kom = $komentar['autor'];
		        	$datum_kom = date("d.m.Y. h:i:s", $komentar['vrijeme2']);
		        	$email_kom = $komentar['email'];
		        	$id_kom = $komentar['id'];

					if($email_kom == "" || $email_kom == null) {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'> Autor: ".$autor_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        	else {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'>Autor: <a href='mailto:".$email_kom."'>".$autor_kom."</a></p>
			            <p class = 'email_kom'> E-mail autora: ".$email_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        	
		        }

		        print("</div>");

		        print("<div id='com_form_wrapper'>
		        	<form id='unos_komentara_form' action='' method='GET'>
		        	<label for='tekst_kom'>Komentar:</label>
		        	<textarea id='tekst_kom' name='tekst_komentara' rows='5'></textarea>
		        	<label for='ime_kom'>Ime:</label>
		        	<input type='text' id = 'ime_kom' name='ime_autora_komentara'>
		        	<label for='email_kom'>E-mail:</label>
		        	<input type='text' id='email_kom' name='email_autora_komentara'>
		        	<input type='button' id='com_sbmt' name='posalji_komentar' value='Posalji' onclick='dodajKomentar(this.form, ".json_encode($novost).")'>
		        	</form>
		        	</div>");	       
		}
		if($_GET['akcija'] == "brisanje") {

				$printajIks = false;
     			if($_SESSION['tip_korisnika'] == "administrator") {
     				$printajIks = true;
     			}

				$id = htmlentities($_GET["id"], ENT_QUOTES);
				$slika = htmlentities($_GET["slika"], ENT_QUOTES);
				$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
				$datum = htmlentities($_GET["datum"], ENT_QUOTES);
				$autor = htmlentities($_GET["autor"], ENT_QUOTES);
				$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
				$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);

				$novost["id"] = $id;
		        $novost["datum"] = $datum;
		        $novost["slika"] = $slika;
		        $novost["naslov"] = $naslov;
		        $novost["autor"] = $autor;
		        $novost["tekst"] = $tekst;
		        $novost["detaljno"] = $detaljno;

				print("<div class = 'item'>
			            <img src ='".$slika."' alt = 'pr_slika'>
			            <h3>".$naslov."</h3>
			            <p class = 'datum'> Datum: ".$datum."</p>
			            <p class = 'autor'> Autor: ".$autor."</p>
			            <p class 'sazetak'>".$tekst."</p>
			            <p class 'sazetak'>".$detaljno."</p>
			            </div>");

				$id_kom = htmlentities($_GET['id_kom'], ENT_QUOTES);

				$conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
				$sql = $conn->prepare("delete from komentar where id= ?");
				$sql ->bindParam(1, $id_p);

				$id_p = $id_kom;

				if (!$sql->execute()) {
				    $greska = $conn->errorInfo();
				   	print "SQL greška: " . $greska[2];
				   	exit();
				}

				$veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	          	$sql = $veza->prepare("select id, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentar where vijest = ? order by vrijeme asc");
		        $sql ->bindParam(1, $id_p);

				$id_p = $id;

		        if (!$sql->execute()) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        $komentari = $sql->fetchAll();

		        print("<h3 id='kom_naslov'>Komentari</h3>");
		        print("<div class = 'comment_wrapper'>");

		        foreach ($komentari as $komentar) {

		        	$tekst_kom = $komentar['tekst'];
		        	$autor_kom = $komentar['autor'];
		        	$datum_kom = date("d.m.Y. h:i:s", $komentar['vrijeme2']);
		        	$email_kom = $komentar['email'];
		        	$id_kom = $komentar['id'];

					if($email_kom == "" || $email_kom == null) {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'> Autor: ".$autor_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        	else {
		        		print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>");
			            if($printajIks) {
			            	print("<img src = 'slike/greska.png' onclick = 'brisiKomentar(".$id_kom.", ".json_encode($novost).");'>");
			            }
			            print("<p class = 'autor'>Autor: <a href='mailto:".$email_kom."'>".$autor_kom."</a></p>
			            <p class = 'email_kom'> E-mail autora: ".$email_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
		        	}
		        	
		        }

		        print("</div>");

		        print("<div id='com_form_wrapper'>
		        	<form id='unos_komentara_form' action='' method='GET'>
		        	<label for='tekst_kom'>Komentar:</label>
		        	<textarea id='tekst_kom' name='tekst_komentara' rows='5'></textarea>
		        	<label for='ime_kom'>Ime:</label>
		        	<input type='text' id = 'ime_kom' name='ime_autora_komentara'>
		        	<label for='email_kom'>E-mail:</label>
		        	<input type='text' id='email_kom' name='email_autora_komentara'>
		        	<input type='button' id='com_sbmt' name='posalji_komentar' value='Posalji' onclick='dodajKomentar(this.form, ".json_encode($novost).")'>
		        	</form>
		        	</div>");	       
		}
	}
?>

