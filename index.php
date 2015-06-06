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
                <li><a id="prijavaDugme" onclick = "prebaci('prijava.html')">Prijava</a></li> 
            </ul>
    </div>
    <div id="wrapper">
        <div id="content">

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