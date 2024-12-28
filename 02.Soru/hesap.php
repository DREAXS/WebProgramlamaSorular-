<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02.Soru.Hesap</title>
</head>
<body>
    <h1>Ürünler ve Hesap</h1>

        <?php
            session_start();

            if (!isset($_SESSION["urunler"])) {
                $_SESSION["urunler"] = array();
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $_SESSION["urunler"] = array();
                header("Location: index.php");
            }
        ?>

        <h2>Ürün Listesi</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                    foreach ($_SESSION["urunler"] as $urun) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($urun["ad"]) . "</td>";
                        echo "<td>" . htmlspecialchars($urun["adet"]) . "</td>";
                        echo "<td>" . htmlspecialchars($urun["fiyat"]) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        
        <?php
            $toplam = 0;
            foreach ($_SESSION["urunler"] as $urun) {
                $toplam += $urun["adet"] * $urun["fiyat"];
            }

            echo "<h3>Toplam: " . $toplam . "</h3>";
        ?>

        <br>
        <a href="index.php">
            <button>Geri dön</button>
        </a>

        <form action="hesap.php" method="post">
            <button type="submit">Tamamla</button>
        </form>
</body>
</html>