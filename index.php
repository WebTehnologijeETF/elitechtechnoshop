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
                <li id="act"><a onclick = "prebaci('naslovnica.html')">Naslovnica</a></li>
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
                <li><a onclick = "prebaci('registracija.html')">Registracija</a></li>
                <li><a onclick = "prebaci('prijava.html')">Prijava</a></li> 
            </ul>
    </div>
    <div id="wrapper">
        <div id="content">
        	<div class = "item">
                <img src="slike/macbook.png" alt="mb_pic">
                <h3>Apple objelodanio novi MacBook</h3>
                <p class = "datum">Datum objave: 22.03.2015.</p>
                <p class = "sazetak">Apple je na svom specijalnom događaju, posvećenom Apple Watch pametnom satu, iskoristio priliku da nam predstavi najnoviji MacBook. Novi kompanijin laptop će se upravo ovako i zvati - MacBook, bez dodatnih kvalifikacija. Laptop je težak svega 907 grama i deluje kao da se radi o zameni za najlakše MacBook Air modele. Uređaj je za 24 odsto lakši od 11-inčnog MacBook Aira, a tanak je svega 13,1 milimetar...<a href="#">Detaljnije</a></p>
            </div>
            <div class = "item">
                <img src="slike/macbook.png" alt="mb_pic">
                <h3>Apple objelodanio novi MacBook</h3>
                <p class = "datum">Datum objave: 22.03.2015.</p>
                <p class = "sazetak">Apple je na svom specijalnom događaju, posvećenom Apple Watch pametnom satu, iskoristio priliku da nam predstavi najnoviji MacBook. Novi kompanijin laptop će se upravo ovako i zvati - MacBook, bez dodatnih kvalifikacija. Laptop je težak svega 907 grama i deluje kao da se radi o zameni za najlakše MacBook Air modele. Uređaj je za 24 odsto lakši od 11-inčnog MacBook Aira, a tanak je svega 13,1 milimetar...<a href="#">Detaljnije</a></p>
            </div>
            <div class = "item">
                <img src="slike/macbook.png" alt="mb_pic">
                <h3>Apple objelodanio novi MacBook</h3>
                <p class = "datum">Datum objave: 22.03.2015.</p>
                <p class = "sazetak">Apple je na svom specijalnom događaju, posvećenom Apple Watch pametnom satu, iskoristio priliku da nam predstavi najnoviji MacBook. Novi kompanijin laptop će se upravo ovako i zvati - MacBook, bez dodatnih kvalifikacija. Laptop je težak svega 907 grama i deluje kao da se radi o zameni za najlakše MacBook Air modele. Uređaj je za 24 odsto lakši od 11-inčnog MacBook Aira, a tanak je svega 13,1 milimetar...<a href="#">Detaljnije</a></p>
            </div>
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