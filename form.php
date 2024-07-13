<!DOCTYPE html>
<html>
<head>
    <title>Formulir Informasi Pribadi dan BMI</title>
</head>
<body>
    <h2>Formulir Informasi Pribadi</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        Umur: <input type="number" name="umur" required><br><br>
        Tinggi (cm): <input type="number" name="tinggi" required><br><br>
        Berat (kg): <input type="number" name="berat" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $umur = intval($_POST['umur']);
        $tinggi = intval($_POST['tinggi']);
        $berat = intval($_POST['berat']);

        // Menghitung BMI
        $tinggi_m = $tinggi / 100; // Konversi tinggi ke meter
        $bmi = $berat / ($tinggi_m * $tinggi_m);

        echo "<h3>Hasil Informasi Pribadi</h3>";
        echo "Nama: $nama<br>";
        echo "Umur: $umur tahun<br>";
        echo "Tinggi: $tinggi cm<br>";
        echo "Berat: $berat kg<br>";
        echo "BMI: " . number_format($bmi, 2) . "<br>";

        // Menentukan kategori BMI
        if ($bmi < 18.5) {
            echo "Status: Kekurangan berat badan";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            echo "Status: Berat badan normal";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            echo "Status: Kelebihan berat badan";
        } else {
            echo "Status: Obesitas";
        }
    }
    ?>
</body>
</html>
