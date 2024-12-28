<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5.Soru</title>
</head>
<body>
    <?php
        $sunucu_adi = "127.0.0.1";
        $kullanici_adi = "root";
        $sifre = "";//abc 
        $veritabani_adi = "DENEME";

        $baglanti = new mysqli($sunucu_adi, $kullanici_adi, $sifre, $veritabani_adi);

        if ($baglanti->connect_error) {
            die("Veritabanına bağlanırken hata oluştu: " . $baglanti->connect_error);
        }

        $sql = "SELECT * FROM LINKLER";
        $sonuc = $baglanti->query($sql);

        if ($sonuc->num_rows > 0) {
            while($satir = $sonuc->fetch_assoc()) {
                echo('<img src="' . htmlspecialchars($satir["hrefText"]) . '" alt="Resim" style="max-width: 100%; height: auto;">');
                echo('<p>' . htmlspecialchars($satir["contextText"]) . '</p><br>');
            }
        } else {
            echo "Hiçbir link bulunamadı.";
        }

        $baglanti->close();
    ?>
</body>
</html>