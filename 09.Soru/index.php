<?php
$sunucu = "192.168.1.100";
$kullanici_adi = "root";
$sifre = "123";
$veritabani_adi = "test";

$baglanti = new mysqli($sunucu, $kullanici_adi, $sifre, $veritabani_adi);

if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$sql = "SELECT grup_id, COUNT(*) AS resim_sayisi FROM final GROUP BY grup_id";
$sonuc = $baglanti->query($sql);

if ($sonuc->num_rows > 0) {
    
    while ($satir = $sonuc->fetch_assoc()) {
        $grup_id = $satir['grup_id'];
        $resim_sayisi = $satir['resim_sayisi'];

        setcookie("grup_id_" . $grup_id, $resim_sayisi, time() + (86400), "/");  
    }
    echo "Her bir grup_id için cookies başarıyla ayarlandı.";
} else {
    echo "Sonuç bulunamadı.";
}

$baglanti->close();
?>
