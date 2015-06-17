<?php

session_start();
     if($_SESSION['tip_korisnika'] == "administrator") {
print("
<h3 id='products_h'>Kategorija proizvoda</h3>
            <p>Klik na sliku proizvoda daje ID, preko kojeg se radi promjena i brisanje. ID pri unosu je generisan od strane sistema
            </p>
            <form id = 'manage_products_form'>
                <div id = 'mpf_d0'>
                    <label for='id_pr'>ID proizvoda:</label>
                    <input id='id_pr' type='text' name='id_pr_in'>
                    <img class = 'greska_icon' id ='greska_id' src = 'slike/greska.png' alt = 'greska_pic'>
                    <p class = 'greska_tekst' id ='greska_tekst_id'>Ne postoji takav ID!</p>
                </div>
                <div id = 'mpf_d1'>
                    <label for='naziv'>Naziv proizvoda:</label>
                    <input id='naziv' type='text' name='naziv_in'>
                    <img class = 'greska_icon' id ='greska_naziv' src = 'slike/greska.png' alt = 'greska_pic'>
                    <p class = 'greska_tekst' id ='greska_tekst_naziv'>Mora biti popunjeno!</p>
                </div>
                <div id = 'mpf_d3'>
                    <label for='slika_url'>Url slike:</label>
                    <input id='slika_url' type='text' name='slika_url_in'>
                </div>
                <div id = 'mpf_d4'>
                    <label for='opis'>Opis:</label>
                    <input id='opis' type='text' name='opis_in'>
                </div>
                <div id = 'mpf_d5'>
                    <label for='cijena'>Cijena proizvoda:</label>
                    <input id='cijena'  type='number' step='0.01' name='cijena_in'>
                    <img class = 'greska_icon' id ='greska_cijena' src = 'slike/greska.png' alt = 'greska_pic'>
                    <p class = 'greska_tekst' id ='greska_tekst_cijena'>Mora biti broj!</p>
                </div>
                <div id = 'mpf_d7'>
                    <input class = 'edit_pr' type='button' id='unesi_btn'  onclick = 'unesiProizvod()' value='Unesi'>
                    <input class = 'edit_pr' type='button' id='obrisi_btn' onclick = 'obrisiProizvod()' value='Obrisi'>
                    <input class = 'edit_pr' type='button' id='promijeni_btn'  onclick = 'promjeniProizvod()' value='Promijeni'>
                </div>
                <div id='resultMPF'></div>
            </form>");
}
?>