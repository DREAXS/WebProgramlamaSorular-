<?php
if (isset($_COOKIE['ogrenciler'])) {
    $ogrenciler = unserialize($_COOKIE['ogrenciler']);
} else {
    echo "Cookie verisi bulunamadı.";
    exit();
}

$toplamOgrenciSayisi = count($ogrenciler);
$toplamOrtalama = 0;

echo "<h1>Öğrencilerin Notları</h1>";
echo "<table border='1'>";
echo "<tr><th>Öğrenci Numarası</th><th>Vize Notu</th><th>Final Notu</th><th>Genel Ortalama</th></tr>";

foreach ($ogrenciler as $ogrenci) {
    $ogrenciNo = $ogrenci['numara'];
    $vizeNotu = $ogrenci['vize'];
    $finalNotu = $ogrenci['final'];

    $genelOrtalama = ($vizeNotu * 0.4) + ($finalNotu * 0.6);
    $toplamOrtalama += $genelOrtalama;
    echo "<tr><td>{$ogrenciNo}</td><td>{$vizeNotu}</td><td>{$finalNotu}</td><td>{$genelOrtalama}</td></tr>";
}

echo "</table>";
$sınıfGenelOrtalamasi = $toplamOrtalama / $toplamOgrenciSayisi;
echo "<h2>Sınıfın Genel Ortalaması: {$sınıfGenelOrtalamasi}</h2>";
?>
