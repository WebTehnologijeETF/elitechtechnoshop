<?php
	$id_p = $_GET['id'];
	$con = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
    $sql = $con->prepare("select id, naslov, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, tekst, urlSlike, detaljno from novost where id=?");
    $sql ->bindParam(1, $id_p);
    if (!$sql->execute()) {
          $error = $con->errorInfo();
          print $error[2];
          exit();
     }
     $novost = $sql->fetchAll();

        $id = $novost[0]['id'];
        $naslov = $novost[0]['naslov'];
        $datum = date("d.m.Y. h:i:s", $novost[0]['vrijeme2']);
        $autor = $novost[0]['autor'];
        $tekst = $novost[0]['tekst'];
        $slika = $novost[0]['urlSlike'];
        $detaljno = $novost[0]['detaljno'];
        

        $novostA["id"] = $id;
        $novostA["datum"] = $datum;
        $novostA["slika"] = $slika;
        $novostA["naslov"] = $naslov;
        $novostA["autor"] = $autor;
        $novostA["tekst"] = $tekst;
        $novostA["detaljno"] = $detaljno;

	
	//header('Content-Type: application/json');
	print(json_encode($novostA));
?>