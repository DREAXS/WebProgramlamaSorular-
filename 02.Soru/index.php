<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02.Soru.Index</title>
</head>
<body>
    <h1>Ürün Ekleme Formu</h1>
        <form action="" method="post">
            <label for="ad">Ürün Adı:</label>
            <input type="text" id="ad" name="ad" placeholder="Ürün adı giriniz" required><br><br>

            <label for="adet">Adet:</label>
            <input type="number" id="adet" name="adet" placeholder="Adet giriniz" required><br><br>

            <label for="fiyat">Fiyat:</label>
            <input type="number" id="fiyat" name="fiyat" placeholder="Fiyat giriniz" required><br><br>

            <button type="submit">Ekle</button>
        </form>
        <br>
        <a href="hesap.php">
            <button>Hesap</button>
        </a>

        <?php
            session_start();

            if (!isset($_SESSION["urunler"])) {
                $_SESSION["urunler"] = array();
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ad = $_POST["ad"];
                $adet = $_POST["adet"];
                $fiyat = $_POST["fiyat"];
                $_SESSION["urunler"][] = array("ad" => $ad, "adet" => $adet, "fiyat" => $fiyat);
            }
        ?>
</body>
</html>