<?php
	session_start();
     if($_SESSION['tip_korisnika'] == "administrator" || $_SESSION['tip_korisnika'] == "korisnik") {
     	print("yes");
     }
     else {
     	print("no");
     }
?>