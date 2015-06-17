<?php
	session_start();
     if($_SESSION['tip_korisnika'] == "administrator") {
     	print("yes");
     }
     else {
     	print("no");
     }
?>