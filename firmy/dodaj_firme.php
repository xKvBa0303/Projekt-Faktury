<?php
include("../config/polaczenie.php");

// Sprawdzamy, czy formularz został wysłany (używamy polskiej nazwy 'nazwa')
if(isset($_POST['nazwa'])){

    // Pobieramy dane z tablicy $_POST
    $nazwa = $_POST['nazwa'];
    $nip = $_POST['nip'];
    $adres = $_POST['adres'];

    // Zapytanie dopasowane do POLSKIEJ bazy danych
    // Tabela: firmy, Kolumny: nazwa, nip, adres
    $sql = "INSERT INTO firmy (nazwa, nip, adres) VALUES ('$nazwa', '$nip', '$adres')";

    if($polaczenie->query($sql)) {
        echo "<p style='color:green;'>Sukces: Firma została dodana do bazy!</p>";
    } else {
        echo "<p style='color:red;'>Błąd zapytania: " . $polaczenie->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj firmę</title>

    <link rel="stylesheet" href="../style1.css">
</head>
<body>

    <h2>Dodaj nową firmę</h2>

    <form method="POST">
        <label>Nazwa firmy:</label><br>
        <input type="text" name="nazwa" required><br><br>

        <label>NIP:</label><br>
        <input type="text" name="nip" required><br><br>

        <label>Adres:</label><br>
        <input type="text" name="adres"><br><br>

        <button type="submit">Zapisz firmę</button>
    </form>

    <br>
    <a href="../index.php">Powrót do menu</a>

</body>
</html>