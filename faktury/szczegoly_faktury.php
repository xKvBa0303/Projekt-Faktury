<?php
include("../config/polaczenie.php");

$id=$_GET['id'];

$sql="SELECT faktury.*,
s.nazwa AS sprzedawca,
n.nazwa AS nabywca
FROM faktury
JOIN firmy s ON faktury.sprzedawca_id=s.id
JOIN firmy n ON faktury.nabywca_id=n.id
WHERE faktury.id=$id";

$faktura=$polaczenie->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Faktura</title>

<link rel="stylesheet" href="../style1.css">
</head>

<body>

<h1>Faktura <?=$faktura['numer_faktury']?></h1>

<p><b>Sprzedawca:</b> <?=$faktura['sprzedawca']?></p>

<p><b>Nabywca:</b> <?=$faktura['nabywca']?></p>

<p><b>Data wystawienia:</b> <?=$faktura['data_wystawienia']?></p>

<br>

<button onclick="window.print()">Drukuj fakturę</button>

<br><br>
<a href="lista_faktur.php">Powrót</a>

</body>
</html>