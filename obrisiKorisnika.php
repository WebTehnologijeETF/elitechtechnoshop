<?php
	
	$id_kor = htmlentities($_GET['id'], ENT_QUOTES);

	$conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
	$sql = $conn->prepare("delete from korisnik where id= ?");
	$sql ->bindParam(1, $id_p);

	$id_p = $id_kor;

	if (!$sql->execute()) {
    	print("no");
		exit();
	}
	print("ok");
?>