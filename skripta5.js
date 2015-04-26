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

	if(grad != "" || post_broj != "")
	{

		validan_grad_pb = provjeriMjestoPB(grad, post_broj);
		if(!validan_grad_pb)
			validno = false;
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

	return validno;
}

function prebaci(stranica) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
			document.open();
			document.write(xmlhttp.responseText);
			document.close();
		}
	}
	xmlhttp.open("GET",stranica, true);
	xmlhttp.send();
}

function webService(grad, pb) {
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {

			var parsirano = JSON.parse(xmlhttp.responseText);
			if(parsirano.hasOwnProperty('greska'))
				document.getElementById("mjestoPBprovjera").innerHTML = "error";
			else if(parsirano.hasOwnProperty('ok'))
				document.getElementById("mjestoPBprovjera").innerHTML = "ok";
			else
				document.getElementById("mjestoPBprovjera").innerHTML = "doslo je do greske";
		}
	}
	xmlhttp.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=" + grad + "&postanskiBroj=" + pb, false);
	xmlhttp.send();
}

function provjeriMjestoPB(grad, pb)	{
	
	webService(grad, pb);
	

	if(document.getElementById("mjestoPBprovjera").innerHTML === "error") {
		document.getElementById('greska_post_broj').style.display = "inline-block";
		document.getElementById('greska_tekst_post_broj').style.display = "block";
		return false;
	}
	else if(document.getElementById("mjestoPBprovjera").innerHTML === "ok") {
		document.getElementById('greska_post_broj').style.display = "none";
		document.getElementById('greska_tekst_post_broj').style.display = "none";
		return true;
	}
	else
		alert("Dogodila se greska pri slanju!");
}

/*
function unesiProizvod() {
	var forma = document.getElementById('manage_products_form');
	var brind = "16294";
	var naziv = forma.naziv_in.value;
	var url = forma.url_in.value;


	var mypostrequest=new XMLHttpRequest();
	mypostrequest.onreadystatechange=function(){
 		if(xmlhttp.status === 200 & xmlhttp.readyState === 4) {
   			document.getElementById("resultMPF").innerHTML=mypostrequest.responseText
  		}
 	}
	var namevalue=encodeURIComponent(naziv);
	var urlvalue=encodeURIComponent(url);
	var brindvalue = encodedURIComponent(brind);
	var parameters="brindexa="+brindvalue+"&naziv="+namevalue+"&url="+urlvalue;
	mypostrequest.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php", true);
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	mypostrequest.send(parameters);
}
*/

menu = document.getElementsByClassName('opens_menu')[0];
menu.addEventListener("click", function(){ prikaziMeniKatalog(); }, false);
menu.addEventListener("mouseleave", function(){ sakrijMeniKatalog(); }, false);