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

	var validno = true;
	var validno_ime = true;
	var validno_prezime = true;
	var validan_mail = true;
	var validan_pass = true;
	var validan_pass_conf = true;

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

	return validno;
}