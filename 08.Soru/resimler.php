<?php
$servername = "192.168.1.100";
$username = "root";
$password = "123";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (isset($_POST['grup_id'])) {
    $grup_id = $_POST['grup_id'];

    $sql = "SELECT * FROM final WHERE grup_id = $grup_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div>";

        while($row = $result->fetch_assoc()) {
            $resim_path = $row['resim_path'];
            $resim_adi = $row['resim_adi'];
            $link = $row['link'];
            echo "<div style='margin-bottom: 20px;'>";

            echo "<a href='$link' target='_blank'>";
            echo "<img src='$resim_path$resim_adi' alt='$resim_adi' style='max-width: 200px; height: auto;'>";
            echo "</a>";

            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Bu grup_id'ye ait resim bulunamadı.";
    }
} else {
    echo "Grup ID gönderilmedi.";
}

$conn->close();
?>
