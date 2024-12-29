<?php
session_start();

if (!isset($_SESSION['ogrenciler'])) {
    $_SESSION['ogrenciler'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adSoyad = $_POST['adSoyad'];
    $okulNumarasi = $_POST['okulNumarasi'];
    
    $yeniOgrenci = [
        'adSoyad' => $adSoyad,
        'okulNumarasi' => $okulNumarasi
    ];
    $_SESSION['ogrenciler'][] = $yeniOgrenci;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>07.Soru</title>
</head>
<body>
    <h1>Öğrenci Bilgileri</h1>

    <form method="POST">
        <label for="adSoyad">Ad Soyad:</label>
        <input type="text" name="adSoyad" id="adSoyad" required><br><br>

        <label for="okulNumarasi">Okul Numarası:</label>
        <input type="text" name="okulNumarasi" id="okulNumarasi" maxlength="9" required><br><br>

        <input type="submit" value="Öğrenci Ekle">
    </form>

    <h2>Eklenen Öğrenciler:</h2>
    <?php

    if (count($_SESSION['ogrenciler']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['ogrenciler'] as $ogrenci) {
            echo "<li>" . $ogrenci['adSoyad'] . " - " . $ogrenci['okulNumarasi'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Henüz öğrenci eklenmemiştir.</p>";
    }
    ?>
</body>
</html>

