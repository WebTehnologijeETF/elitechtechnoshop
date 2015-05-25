window.onload = function() {
	var slike = document.getElementsByClassName('greska_icon');
	var tekstovi = document.getElementsByClassName('greska_tekst');
	for(i = 0; i < slike.length; i++) {
		slike[i].style.display = "none";
		tekstovi[i].style.display = "none";
	}
	var meni = document.getElementById('meni_katalog');
	meni.style.display = "none";
	meni.style.position = "absolute";
	var c = document.getElementById("act").childNodes;
	if(c[0].innerHTML === "Naslovnica") {
		prikaziNovosti();
	}
	
}

function prikaziNovosti() {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
			document.getElementById("content").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","novosti.php", true);
	xmlhttp.send();
}

function postaviMeni() {
	var meni = document.getElementById('meni_katalog');
	meni.style.display = "none";
	meni.style.position = "absolute";
}

function sakrijGreske() {
	var slike = document.getElementsByClassName('greska_icon');
	var tekstovi = document.getElementsByClassName('greska_tekst');
	for(i = 0; i < slike.length; i++) {
		slike[i].style.display = "none";
		tekstovi[i].style.display = "none";
	}
}

function prikaziMeniKatalog() {
	var meni = document.getElementById('meni_katalog');
	meni.style.display = "block";
	meni.style.clear = "both";
	var lista = document.getElementsByClassName('menu_item_katalog');
	for(var i = 0; i < lista.length; i++) {
		lista[i].style.display = "block";
		lista[i].style.clear = "both";
	}
}

function sakrijMeniKatalog() {
	var meni = document.getElementById('meni_katalog');
	meni.style.display = "none";
}

function provjeriPodatkeProizvoda(proizvod, tip_akcije) {

	if(tip_akcije === "brisanje") {
		var istina = false;
		var id_evi = document.getElementsByClassName("za_prod_id");
		for(i = 0; i < id_evi.length; i++) {
			if(id_evi[i].innerHTML === proizvod.id) {
				istina = true;
			}
		}

		if(istina === false) {
			document.getElementById('greska_id').style.display = "inline-block";
			document.getElementById('greska_tekst_id').style.display = "block";
			return false;
		}
		else {
			document.getElementById('greska_id').style.display = "none";
			document.getElementById('greska_tekst_id').style.display = "none";
			return true;
		}
	}

	else {
		var validan_naziv = true;
		var validna_cijena = true;
		var validan_id = true
		var validno = true;

		if(tip_akcije === "izmjena") {
			var istina = false;
			var id_evi = document.getElementsByClassName("za_prod_id");
			for(i = 0; i < id_evi.length; i++) {
				if(id_evi[i].innerHTML === proizvod.id) {
					istina = true;
				}
			}

			if(istina === false) {
				document.getElementById('greska_id').style.display = "inline-block";
				document.getElementById('greska_tekst_id').style.display = "block";
			}
			else {
				document.getElementById('greska_id').style.display = "none";
				document.getElementById('greska_tekst_id').style.display = "none";
			}
			validno = istina;
			validan_id = istina;
		}

		if(proizvod.naziv.length === 0) {
			document.getElementById('greska_naziv').style.display = "inline-block";
			document.getElementById('greska_tekst_naziv').style.display = "block";
			validan_naziv = false;
			validno = false;
		}

		if(!dobarBroj(proizvod.cijena)) {
			document.getElementById('greska_cijena').style.display = "inline-block";
			document.getElementById('greska_tekst_cijena').style.display = "block";
			validna_cijena = false;
			validno = false;
		}

		if(validan_naziv) {
			document.getElementById('greska_naziv').style.display = "none";
			document.getElementById('greska_tekst_naziv').style.display = "none";
		}

		if(validna_cijena) {
			document.getElementById('greska_cijena').style.display = "none";
			document.getElementById('greska_tekst_cijena').style.display = "none";
		}

		return validno;

	}
}

function dobarBroj(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function provjeriFormu () {
	var forma = document.getElementById('sign_up_form');
	var ime = forma.ime_in.value;
	var prezime = forma.prezime_in.value;
	var mail = forma.mail_in.value;
	var pass = forma.pass_in.value;
	var pass_conf = forma.pass_conf_in.value;

	var grad = forma.grad_in.value;
	var post_broj = forma.post_broj_in.value;

	var validno = true;
	var validno_ime = true;
	var validno_prezime = true;
	var validan_mail = true;
	var validan_pass = true;
	var validan_pass_conf = true;

	var validan_grad_pb = true;

	var mail_regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

	for(var i = 0; i < ime.length; i++) {
		var lt = ime.charCodeAt(i);
		if(!((lt >= 65 && lt <= 90) || (lt >= 97 && lt <= 122))) {
			validno = false;
			validno_ime = false;
			document.getElementById('greska_ime').style.display = "inline-block";
			document.getElementById('greska_tekst_ime').style.display = "block";
			break;
		}
	}

	if(ime.length == 0) {
		validno = false;
		validno_ime = false;
		document.getElementById('greska_ime').style.display = "inline-block";
		document.getElementById('greska_tekst_ime').style.display = "block";
	}

	for(var i = 0; i < prezime.length; i++) {
		var lt = prezime.charCodeAt(i);
		if(!((lt >= 65 && lt <= 90) || (lt >= 97 && lt <= 122))) {
			validno = false;
			validno_prezime = false;
			document.getElementById('greska_prezime').style.display = "inline-block";
			document.getElementById('greska_tekst_prezime').style.display = "block";
			break;
		}
	}

	if(prezime.length == 0) {
		validno = false;
		validno_prezime = false;
		document.getElementById('greska_prezime').style.display = "inline-block";
		document.getElementById('greska_tekst_prezime').style.display = "block";
	}

	if(!mail_regex.test(mail)) {
		validno = false;
		validan_mail = false;
		document.getElementById('greska_mail').style.display = "inline-block";
		document.getElementById('greska_tekst_mail').style.display = "block";
	}

	if(pass.length < 6) {
		validno = false;
		validan_pass = false;
		document.getElementById('greska_pass').style.display = "inline-block";
		document.getElementById('greska_tekst_pass').style.display = "block";
	}

	if(pass != pass_conf) {
		validno = false;
		validan_pass_conf = false;
		document.getElementById('greska_conf_pass').style.display = "inline-block";
		document.getElementById('greska_tekst_conf_pass').style.display = "block";
	}

	if(validno_ime) {
		document.getElementById('greska_ime').style.display = "none";
		document.getElementById('greska_tekst_ime').style.display = "none";
	}

	if(validno_prezime) {
		document.getElementById('greska_prezime').style.display = "none";
		document.getElementById('greska_tekst_prezime').style.display = "none";
	}

	if(validan_mail) {
		document.getElementById('greska_mail').style.display = "none";
		document.getElementById('greska_tekst_mail').style.display = "none";
	}

	if(validan_pass) {
		document.getElementById('greska_pass').style.display = "none";
		document.getElementById('greska_tekst_pass').style.display = "none";
	}

	if(validan_pass_conf) {
		document.getElementById('greska_conf_pass').style.display = "none";
		document.getElementById('greska_tekst_conf_pass').style.display = "none";
	}

	if(grad != "" || post_broj != "")
	{
		webService(grad, post_broj, validno);
	}
	else {
		if(validno) {
			//document.getElementById("sign_up_form").submit();
			//forma se ne sumbita jer je ovaj dio zadatak na sljedecoj spirali i bit ce implementiran u php-u
			alert("Podaci su uspjesno poslani!");
			//forma.reset();
		}
	}
}

function prebaci(stranica) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {

			document.getElementById("page").innerHTML = xmlhttp.responseText;
			postaviMeni();
			if(stranica === "katalog.html" || stranica === "registracija.html")
				sakrijGreske();
			if(stranica === "katalog.html")
				ucitajProizvode();
			if(stranica === "naslovnica.html")
				prikaziNovosti();

		}
	}
	xmlhttp.open("GET",stranica, true);
	xmlhttp.send();
}



function webService(grad, pb, validno) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {

			var parsirano = JSON.parse(xmlhttp.responseText);
			if(parsirano.hasOwnProperty('greska')) {
				document.getElementById("mjestoPBprovjera").innerHTML = "error";
				document.getElementById('greska_post_broj').style.display = "inline-block";
				document.getElementById('greska_tekst_post_broj').style.display = "block";
			}
			else if(parsirano.hasOwnProperty('ok')) {
				document.getElementById("mjestoPBprovjera").innerHTML = "ok";
				document.getElementById('greska_post_broj').style.display = "none";
				document.getElementById('greska_tekst_post_broj').style.display = "none";
				if(validno) {
					//document.getElementById("sign_up_form").submit();
					//forma se ne sumbita jer je ovaj dio zadatak na sljedecoj spirali i bit ce implementiran u php-u
					alert("Podaci su uspjesno poslani!");
					//document.getElementById('sign_up_form').reset();
				}
			}
			else
				alert("doslo je do greske");
		}
	}
	xmlhttp.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=" + grad + "&postanskiBroj=" + pb, true);
	xmlhttp.send();
}

function unesiProizvod() {

	var forma = document.getElementById('manage_products_form');
	var naziv = forma.naziv_in.value;
	var opis = forma.opis_in.value;
	var cijena = forma.cijena_in.value;
	var slika = forma.slika_url_in.value;
	var proizvod = {
		naziv: naziv,
		opis: opis,
		slika: slika,
		cijena: cijena
	};

	if(provjeriPodatkeProizvoda(proizvod, "unos") === true) {
		var mypostrequest=new XMLHttpRequest();
		mypostrequest.onreadystatechange=function(){
	 		if(mypostrequest.status === 200 & mypostrequest.readyState === 4) {
	   			alert("Uspjesno ste unijeli artikal!");
	   			ucitajProizvode();
	  		}
	 	}
		
		mypostrequest.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16294", true);
		mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		mypostrequest.send("akcija=dodavanje" + "&brindexa=16294&proizvod=" + JSON.stringify(proizvod));
	}
}


function obrisiProizvod() {

	var forma = document.getElementById('manage_products_form');
	var id_pr = forma.id_pr_in.value;
	var proizvod = {
		id: id_pr
	};

	if(provjeriPodatkeProizvoda(proizvod, "brisanje") === true) {
		var mypostrequest=new XMLHttpRequest();
		mypostrequest.onreadystatechange=function(){
 			if(mypostrequest.status === 200 & mypostrequest.readyState === 4) {
	   			alert("Uspjesno ste obrisali proizvod!");
	   			ucitajProizvode();
	  		}
	 	}
		
		mypostrequest.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16294", true);
		mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		mypostrequest.send("akcija=brisanje" + "&brindexa=16294&proizvod=" + JSON.stringify(proizvod));
	}
}

function promjeniProizvod() {

	var forma = document.getElementById('manage_products_form');
	var id = forma.id_pr_in.value;
	var naziv = forma.naziv_in.value;
	var opis = forma.opis_in.value;
	var cijena = forma.cijena_in.value;
	var slika = forma.slika_url_in.value;
	var proizvod = {
		id: id,
		naziv: naziv,
		opis: opis,
		slika: slika,
		cijena: cijena
	};

	if(provjeriPodatkeProizvoda(proizvod, "izmjena") === true) {
		var mypostrequest=new XMLHttpRequest();
		mypostrequest.onreadystatechange=function(){
	 		if(mypostrequest.status === 200 & mypostrequest.readyState === 4) {
	   			alert("Uspjesno ste promjenili proizvod!");
	   			ucitajProizvode();
	  		}
	 	}
		
		mypostrequest.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16294", true);
		mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		mypostrequest.send("akcija=promjena" + "&brindexa=16294&proizvod=" + JSON.stringify(proizvod));
	}
	
}

function ucitajProizvode() {

	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(event){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
			var lista = JSON.parse(xmlhttp.responseText);
			populisiTabelu(lista);
			event.preventDefault();
		}
	}

	xmlhttp.open("GET","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16294", true);
	xmlhttp.send();

}

function populisiTabelu(lista) {


	var i = 0;
	var zaUbaciti = "";
	for(var index = lista.length - 1; index >= 0; index--) {
		if(i === 0) {
			zaUbaciti = zaUbaciti + "<tr>";
		}
			
		zaUbaciti = zaUbaciti + "<td><div class = 'table_product'><a href='#'><img class='product_img' src=" + lista[index].slika + " alt='pr_pic' onclick = 'ubaciID(" + lista[index].id + ")'></a><a href='#'><h4>" + lista[index].naziv + "</h4></a><p class = 'opis'>" + lista[index].opis + "</p><h3>" + lista[index].cijena + " KM</h3><a href='#'><img class='basket_img' src='slike/kosarica.png' alt='kosarica'></a></div><p class = 'za_prod_id'>" + lista[index].id + "</p></td>";
		i += 1;
		if(i === 3) {
			i = 0;
			zaUbaciti = zaUbaciti + "<tr>";
		}
	}
		if(i != 0) {
			zaUbaciti = zaUbaciti + "<tr>";
		}
		
		document.getElementById("tabela_proizvoda").innerHTML = zaUbaciti;
		var id_evi = document.getElementsByClassName("za_prod_id");
		for(i = 0; i < id_evi.length; i++) {
			id_evi[i].style.display = "none";
		}

}

function ubaciID(id_pr) {
	var forma = document.getElementById('manage_products_form');
	forma.id_pr_in.value = id_pr;
}

function resetujFormuRegistracija() {
	document.getElementById("sign_up_form").reset();
}

function dajNovost(novostJSON) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {

			document.getElementById("content").innerHTML = xmlhttp.responseText;
			postaviMeni();
		}
	}
	//xmlhttp.open("GET","detaljno.php?akcija=upad&id=" + id, true);
	xmlhttp.open("GET","detaljno.php?akcija=upad&id=" + novostJSON.id + "&datum=" + novostJSON.datum + "&autor=" + novostJSON.autor + "&naslov=" + novostJSON.naslov + "&slika=" + novostJSON.slika + "&tekst=" + novostJSON.tekst + "&detaljno=" + novostJSON.detaljno, true);
	xmlhttp.send();
}

function dajKomentare(novostJSON) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
			document.getElementById("content").innerHTML = xmlhttp.responseText;
			postaviMeni();
		}
	}
	//xmlhttp.open("GET","detaljno.php?akcija=upad&id=" + id, true);
	xmlhttp.open("GET","detaljno.php?akcija=pregled&id=" + novostJSON.id + "&datum=" + novostJSON.datum + "&autor=" + novostJSON.autor + "&naslov=" + novostJSON.naslov + "&slika=" + novostJSON.slika + "&tekst=" + novostJSON.tekst + "&detaljno=" + novostJSON.detaljno, true);
	xmlhttp.send();
}

function dodajKomentar(forma, novostJSON) {
	var tekst_komentara = forma.tekst_komentara.value;
	var ime_autora = forma.ime_autora_komentara.value;
	var email_autora = forma.email_autora_komentara.value;
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
			document.getElementById("content").innerHTML = xmlhttp.responseText;
			postaviMeni();
		}
	}
	//xmlhttp.open("GET","detaljno.php?akcija=upad&id=" + id, true);
	xmlhttp.open("GET","detaljno.php?akcija=dodavanje&tekstKomentara=" + tekst_komentara + "&imeAutora=" + ime_autora + "&emailAutora=" + email_autora + "&id=" + novostJSON.id + "&datum=" + novostJSON.datum + "&autor=" + novostJSON.autor + "&naslov=" + novostJSON.naslov + "&slika=" + novostJSON.slika + "&tekst=" + novostJSON.tekst + "&detaljno=" + novostJSON.detaljno, true);
	xmlhttp.send();
}