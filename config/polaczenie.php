<?php
$polaczenie =mysqli_connect("localhost","root","","faktury_system");

if($polaczenie->connect_error){
    die("Błąd połączenia z bazą danych");
}
?>