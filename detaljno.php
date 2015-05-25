<?php
	if(isset($_GET['akcija'])) {
		if($_GET['akcija'] == "upad") {
			/*$id = htmlentities($_GET["id"], ENT_QUOTES);
			$con = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
    		$con->exec("set names utf8");
    		$lista_vijesti = $con->query("select naslov, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, tekst, urlSlike, detaljno from novost order by vrijeme desc");
    		if (!$lista_vijesti) {
		          $error = $con->errorInfo();
		          print $error[2];
		          exit();
		     }*/


			    $id = htmlentities($_GET["id"], ENT_QUOTES);
				$slika = htmlentities($_GET["slika"], ENT_QUOTES);
				$naslov = htmlentities($_GET["naslov"], ENT_QUOTES);
				$datum = htmlentities($_GET["datum"], ENT_QUOTES);
				$autor = htmlentities($_GET["autor"], ENT_QUOTES);
				$tekst = htmlentities($_GET["tekst"], ENT_QUOTES);
				$detaljno = htmlentities($_GET["detaljno"], ENT_QUOTES);

				$veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	          	$komentari = $veza->query("select * from komentar where vijest=".$id);
		        if (!$komentari) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
	          	//$veza->close();
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
			            <p><a onclick='dajKomentare(".json_encode($novost).")'>".$komentari->rowCount()." komentara</a></p>
			            </div>");
		}
		if($_GET['akcija'] == "pregled") {

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
	          	$komentari = $veza->query("select tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentar where vijest=".$id." order by vrijeme desc");
		        if (!$komentari) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        //$veza->close();
		        print("<h3 id='kom_naslov'>Komentari</h3>");
		        print("<div class = 'comment_wrapper'>");

		        foreach ($komentari as $komentar) {

		        	$tekst_kom = $komentar['tekst'];
		        	$autor_kom = $komentar['autor'];
		        	$datum_kom = date("d.m.Y. h:i:s", $komentar['vrijeme2']);
		        	$email_kom = $komentar['email'];




		        	print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>
			            <p class = 'autor'> Autor: ".$autor_kom."</p>
			            <p class = 'email_kom'> E-mail autora: ".$email_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
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

				$tk = $_GET['tekstKomentara'];
				$ak = $_GET['imeAutora'];
				$ea = $_GET['emailAutora'];
				$conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
				$sql = "insert into komentar (vijest, autor, tekst, email) values (".$id.", '".$ak."', '".$tk."', '".$ea."')";
				if (!$conn->query($sql)) {
				    $greska = $conn->errorInfo();
				   	print "SQL greška: " . $greska[2];
				   	exit();
				}

		        //$veza1->close();

				$veza = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	          	$komentari = $veza->query("select tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentar where vijest=".$id." order by vrijeme desc");
		        if (!$komentari) {
		        	$greska = $veza->errorInfo();
		        	print "SQL greška: " . $greska[2];
		        	exit();
		        }
		        //$veza->close();
		        print("<h3 id='kom_naslov'>Komentari</h3>");
		        print("<div class = 'comment_wrapper'>");

		        foreach ($komentari as $komentar) {

		        	$tekst_kom = $komentar['tekst'];
		        	$autor_kom = $komentar['autor'];
		        	$datum_kom = date("d.m.Y. h:i:s", $komentar['vrijeme2']);
		        	$email_kom = $komentar['email'];




		        	print("<div class = 'comment'>
			            <p class = 'datum'> Datum: ".$datum_kom."</p>
			            <p class = 'autor'> Autor: ".$autor_kom."</p>
			            <p class = 'email_kom'> E-mail autora: ".$email_kom."</p>
			            <p class 'sazetak'>".$tekst_kom."</p>
			            </div>");
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
	/*
		*/
?>

