<?php
include("../config/polaczenie.php");

$sql = "SELECT f.*, 
        s.nazwa AS sprzedawca_nazwa,
        n.nazwa AS nabywca_nazwa
        FROM faktury f
        JOIN firmy s ON f.sprzedawca_id = s.id
        JOIN firmy n ON f.nabywca_id = n.id";

$wynik = $polaczenie->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>Lista faktur</title>


<link rel="stylesheet" href="../style1.css"></head>
<body>
    <h2>Lista faktur</h2>
    <table border="1">
        <tr>
            <th>Numer</th>
            <th>Sprzedawca</th>
            <th>Nabywca</th>
            <th>Akcje</th>
        </tr>
        <?php while($f = $wynik->fetch_assoc()): ?>
        <tr>
            <td><?=$f['numer_faktury']?></td>
            <td><?=$f['sprzedawca_nazwa']?></td>
            <td><?=$f['nabywca_nazwa']?></td>
            <td><a href="szczegoly_faktury.php?id=<?=$f['id']?>">Zobacz</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>