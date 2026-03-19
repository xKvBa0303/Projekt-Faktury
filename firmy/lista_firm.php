<?php
include("../config/polaczenie.php");

// Zapytanie do POLSKIEJ tabeli 'firmy'
$wynik = $polaczenie->query("SELECT * FROM firmy");

if (!$wynik) {
    die("Błąd w zapytaniu: " . $polaczenie->error);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista firm</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        td, th { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>

    <link rel="stylesheet" href="../style1.css">
</head>
<body>

    <h2>Zarejestrowane firmy</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nazwa firmy</th>
            <th>NIP</th>
            <th>Adres</th>
        </tr>

        <?php
        // Pobieramy dane z polskiej tabeli
        while($f = $wynik->fetch_assoc()){
        ?>
        <tr>
            <td><?=$f['id']?></td>
            <td><?=$f['nazwa']?></td>
            <td><?=$f['nip']?></td>
            <td><?=$f['adres']?></td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="../index.php">Powrót do menu głównego</a>

</body>
</html>