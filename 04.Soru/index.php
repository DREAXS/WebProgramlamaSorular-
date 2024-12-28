<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.Soru</title>
</head>
<body>

    <form action="index.php" method="post">
        <label for="kullaniciadi">Kullanıcı Adı:</label>
        <input type="text" name="kullaniciadi" id="kullaniciadi" required>
        <br>
        <label for="sifre">Şifre:</label>
        <input type="password" name="sifre" id="sifre" required>
        <br>
        <button type="submit">Giriş Yap</button>
    </form>

    <?php
        
        if(!isset($_COOKIE["deneme_sayisi"])) {
            setcookie("deneme_sayisi", "0", time() + 86400); 
        }

        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $kullaniciadi = $_POST["kullaniciadi"];
            $sifre = $_POST["sifre"];

            
            if($kullaniciadi == "admin" && $sifre == "123") {
                echo "<p>Giriş Başarılı</p>";
                setcookie("deneme_sayisi", "0", time() + 86400);
            } else {
                $giris_sayisi = intval($_COOKIE["deneme_sayisi"]);

                if($giris_sayisi >= 3) {
                    echo "<p>Giriş Reddedildi</p>";
                } else {
                    $giris_sayisi++;
                    setcookie("deneme_sayisi", strval($giris_sayisi), time() + 86400);
                    echo "<p>Yanlış kullanıcı adı veya şifre. (Deneme sayısı: " . $giris_sayisi . ")</p>";
                }
            }
        }
    ?>
</body>
</html>