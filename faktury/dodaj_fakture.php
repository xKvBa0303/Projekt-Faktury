<?php
include("../config/polaczenie.php");

if(isset($_POST['numer'])){
    $numer = $_POST['numer'];
    $data_w = $_POST['data_wystawienia'];
    $data_s = $_POST['data_sprzedazy'];
    $sprzedawca = $_POST['sprzedawca'];
    $nabywca = $_POST['nabywca'];

    $sql = "INSERT INTO faktury (numer_faktury, data_wystawienia, data_sprzedazy, sprzedawca_id, nabywca_id, status_id)
            VALUES ('$numer', '$data_w', '$data_s', '$sprzedawca', '$nabywca', 1)";

    if($polaczenie->query($sql)) {
        echo "Faktura została zapisana!";
    } else {
        echo "Błąd: " . $polaczenie->error;
    }
}

$firmy = $polaczenie->query("SELECT * FROM firmy");
?>

<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>Nowa faktura</title>
<link rel="stylesheet" href="../style1.css">
</head>
<body>
    <h2>Wystaw fakturę</h2>
    <form method="POST">
        Numer: <input name="numer" required><br>
        Data wystawienia: <input type="date" name="data_wystawienia" required><br>
        Data sprzedaży: <input type="date" name="data_sprzedazy" required><br>
        
        Sprzedawca:
        <select name="sprzedawca">
            <?php while($f = $firmy->fetch_assoc()): ?>
                <option value="<?=$f['id']?>"><?=$f['nazwa']?></option>
            <?php endwhile; ?>
        </select><br>

        Nabywca:
        <select name="nabywca">
            <?php $firmy->data_seek(0); while($f = $firmy->fetch_assoc()): ?>
                <option value="<?=$f['id']?>"><?=$f['nazwa']?></option>
            <?php endwhile; ?>
        </select><br>

        <button type="submit">Zapisz fakturę</button>
    </form>
</body>
</html>