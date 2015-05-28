<?php
if(isset($_GET['akcija'])) {
    if($_GET['akcija'] == "dodavanje") {
        $naslov = $_GET['naslov'];
        $autor = $_GET['autor'];
        $tekst = $_GET['tekst'];
        $slika = $_GET['url'];
        $detaljno = $_GET['detaljno'];

        $conn = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
                $sql = $conn->prepare("insert into novost (naslov, autor, tekst, urlSlike, detaljno) values (?, ?, ?, ?, ?)");
                $sql ->bindParam(1, $naslov_n);
                $sql ->bindParam(2, $autor_n);
                $sql ->bindParam(3, $tekst_n);
                $sql ->bindParam(4, $url_n);
                $sql ->bindParam(5, $detaljno_n);

                $naslov_n = $naslov;
                $autor_n = $autor;
                $tekst_n = $tekst;
                $url_n = $slika;
                $detaljno_n = $detaljno;

                if (!$sql->execute()) {
                    print_r(mysql_error($conn));
                    exit();
                }


    }
}
    session_start();
     if($_SESSION['tip_korisnika'] == "administrator") {
        print("
                    <form id='unos_novosti_form' action='' method='GET'>
                    <label for='naslov'>Naslov:</label>
                    <input id='naslov' name='naslov_novosti'>
                    <label for='autor'>Autor:</label>
                    <input type='text' id = 'autor' name='autor_novosti'>
                    <label for='slika'>Url slike:</label>
                    <input type='text' id='slika' name='slika_novosti'>
                    <label for='tekst'>Tekst:</label>
                    <textarea id='tekst' name='tekst_novosti' rows='3'></textarea>
                    <label for='detaljno'>Detaljno:</label>
                    <textarea id='detaljno' name='detaljno_novosti' rows='7'></textarea>
                    <input type='button' id='novost_sbmt' name='unesi_novost' value='Unesi' onclick='dodajNovost(this.form);'>
                    </form>
                    ");
     }
    $con = new PDO("mysql:dbname=elitech;host=localhost;charset=utf8", "root", "dbpass");
    $con->exec("set names utf8");
    $lista_vijesti = $con->query("select id, naslov, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, tekst, urlSlike, detaljno from novost order by vrijeme desc");
    if (!$lista_vijesti) {
          $error = $con->errorInfo();
          print $error[2];
          exit();
     }
     

     foreach($lista_vijesti as $vijest) {
        $id = $vijest['id'];
        $naslov = $vijest['naslov'];
        $datum = date("d.m.Y. h:i:s", $vijest['vrijeme2']);
        $autor = $vijest['autor'];
        $tekst = $vijest['tekst'];
        $slika = $vijest['urlSlike'];
        $detaljno = $vijest['detaljno'];

        //$linkDetaljno = "";
        //if($detaljno != "" && $detaljno != null) {
            $linkDetaljno = "Detaljnije";
        //}

        $novost["id"] = $id;
        $novost["datum"] = $datum;
        $novost["slika"] = $slika;
        $novost["naslov"] = $naslov;
        $novost["autor"] = $autor;
        $novost["tekst"] = $tekst;
        $novost["detaljno"] = $detaljno;

        print("<div class = 'item'>
            <img src ='".htmlentities($slika, ENT_QUOTES)."' alt = 'pr_slika'>
            <h3>".htmlentities($naslov, ENT_QUOTES)."</h3>
            <p class = 'datum'> Datum: ".htmlentities($datum, ENT_QUOTES)."</p>
            <p class = 'autor'> Autor: ".htmlentities($autor, ENT_QUOTES)."</p>
            <p class = 'sazetak'>".htmlentities($tekst, ENT_QUOTES)."<a onclick='dajNovost(".json_encode($novost).")'>".$linkDetaljno."</a></p>
            </div>"); 
     }
?>