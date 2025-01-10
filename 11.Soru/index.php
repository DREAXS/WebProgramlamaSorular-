<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ogrenciNo = $_POST['numara'];
    $vizeNotu = $_POST['vize'];
    $finalNotu = $_POST['final'];

    if (isset($_COOKIE['ogrenciler'])) {
        $ogrenciler = unserialize($_COOKIE['ogrenciler']);
    } else {
        $ogrenciler = [];
    }

    $ogrenciler[] = ['numara' => $ogrenciNo, 'vize' => $vizeNotu, 'final' => $finalNotu];

    setcookie('ogrenciler', serialize($ogrenciler), time() + 3600, "/"); // 1 saat geçerli
    echo "Öğrenci verisi başarıyla kaydedildi!";
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Öğrenci Notları Girişi</h1>
<form method="POST" action="index.php">
    <label for="numara">Öğrenci Numarası:</label><br>
    <input type="text" id="numara" name="numara" required><br><br>
    <label for="vize">Vize Notu:</label><br>
    <input type="number" id="vize" name="vize" required><br><br>
    <label for="final">Final Notu:</label><br>
    <input type="number" id="final" name="final" required><br><br>
    <input type="submit" value="Öğrenci Kaydet">
</form>
<form action="listele.php" method="get">
    <button type="submit">Öğrencileri Listele</button>
</form>
</body>
</html>
