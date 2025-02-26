<?php
// Konfigurasi koneksi database
$host = 'localhost'; // Sesuaikan dengan host database Anda
$username = 'root'; // Sesuaikan dengan username database Anda
$password = ''; // Sesuaikan dengan password database Anda
$database = 'db_register'; // Sesuaikan dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menghitung nilai CF Gejala
function calculateCF($cfPakar, $cfUser) {
    return $cfPakar * $cfUser;
}

// Fungsi untuk menghitung CF gabungan
function combineCF($cfOld, $cfNew) {
    return $cfOld + $cfNew * (1 - $cfOld);
}

// Data gejala dan nilai CF pakar (perbedaan basis pengetahuan user dan pakar)
$symptoms = [
    'Nyeri seluruh tubuh' => 1.0,
    'Nyeri sendi' => 0.8,
    'Nyeri otot' => 0.6,
    'Nyeri perut' => 0.4,
    'Demam' => 1.0,
    'Pilek' => 0.1,
    'Bintik merah pada kulit' => 0.6,
    'Sakit kepala' => 0.7,
    'Mual' => 0.1,
    'Muntah' => 0.1,
    'Nafsu makan berkurang' => 0.7,
    'Denyut nadi cepat dan lemah' => 0.7,
    'Sakit Punggung' => 0.1,
    'Tubuh terasa dingin' => 0.8,
    'Kesadaran menurun' => 0.3,
    'Gusi berdarah' => 0.5,
    'Batuk berdahak' => 0.1,
    'Diare' => 0.1,
    'Sulit bernafas' => 0.1,
];

// Fungsi untuk mengubah input keyakinan menjadi nilai CF User
function getUserCF($confidence) {
    switch ($confidence) {
        case 'Tidak':
            return rand(0, 1) / 10; // 0 – 0.1
        case 'Tidak Tahu':
            return rand(2, 3) / 10; // 0.2 – 0.3
        case 'Sedikit Yakin':
            return rand(4, 5) / 10; // 0.4 – 0.5
        case 'Cukup Yakin':
            return rand(6, 7) / 10; // 0.6 – 0.7
        case 'Yakin':
            return rand(8, 9) / 10; // 0.8 – 0.9
        case 'Sangat Yakin':
            return 1; // 1
        default:
            return 0;
    }
}

// Tambahan fitur logout
if (isset($_GET['logout'])) {
    header('Location: logout.php');
    exit();
}

// Inisialisasi nilai CF user
$cfValues = [];
$finalCF = 0;
$cfCombinationValues = []; // Menyimpan CF kombinasi per langkah

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menghitung nilai CF untuk setiap gejala
    foreach ($symptoms as $symptom => $cfPakar) {
        // Mengambil nilai keyakinan user dari input form
        $confidence = $_POST['cf_user'][$symptom];
        $cfUser = getUserCF($confidence); // Menghitung CF User berdasarkan keyakinan
        $cfValues[$symptom] = calculateCF($cfPakar, $cfUser);

        // Hitung CF gabungan
        $finalCF = combineCF($finalCF, $cfValues[$symptom]);
        $cfCombinationValues[$symptom] = $finalCF; // Simpan nilai CF gabungan
    }

    // Menghitung persentase keyakinan berdasarkan CF final
    $confidencePercentage = $finalCF * 100;

    // Simpan hasil ke database
    $stmt = $conn->prepare("INSERT INTO diagnosis_results (user_id, gejala, cf_pakar, cf_user, cf_gejala, cf_combined, final_cf, confidence_percentage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Tentukan user_id (misalnya, 1, ganti sesuai dengan user yang login)
    $userId = 1; // Ini harus disesuaikan dengan ID user yang login
    
    // Masukkan data ke dalam query
    foreach ($symptoms as $symptom => $cfPakar) {
        $cfUserValue = getUserCF($_POST['cf_user'][$symptom]);
        $cfGejala = calculateCF($cfPakar, $cfUserValue);
        $cfCombined = $cfCombinationValues[$symptom];
        
        // Bind parameter dengan benar
        $stmt->bind_param("isdddddd", $userId, $symptom, $cfPakar, $cfUserValue, $cfGejala, $cfCombined, $finalCF, $confidencePercentage);
        $stmt->execute();
    }
    $stmt->close();
}

// Tutup koneksi database
$conn->close();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Demam Berdarah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #E0BBE4, #957DAD, #D291BC); /* Gradasi biru, soft purple, pink */
            color: #4A4A4A;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #6A5ACD;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #6A5ACD;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #DDD;
            border-radius: 10px;
            background-color: #6A5ACD;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #8A2BE2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid #DDD;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #D1C4E9;
            color: #4A4A4A;
        }
        .result {
            margin-top: 30px;
            padding: 15px;
            background-color: #E1BEE7;
            border-left: 5px solid #6A5ACD;
            border-radius: 8px;
        }
        .result p {
            font-size: 18px;
            font-weight: bold;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .logout a {
            background-color: #FF69B4;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            background-color: #FF1493;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Diagnosa Demam Berdarah</h1>
        <form method="post">
            <?php foreach ($symptoms as $symptom => $cfPakar): ?>
                <div class="form-group">
                    <label for="cf_user_<?= $symptom ?>"><?= $symptom ?> (CF Pakar: <?= $cfPakar ?>)</label>
                    <select name="cf_user[<?= $symptom ?>]" required>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak Tahu">Tidak Tahu</option>
                        <option value="Sedikit Yakin">Sedikit Yakin</option>
                        <option value="Cukup Yakin">Cukup Yakin</option>
                        <option value="Yakin">Yakin</option>
                        <option value="Sangat Yakin">Sangat Yakin</option>
                    </select>
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Hitung Diagnosa">
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <table>
                <thead>
                    <tr>
                        <th>Gejala</th>
                        <th>CF Pakar</th>
                        <th>CF User</th>
                        <th>CF Gejala</th>
                        <th>CF Kombinasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cfValues as $symptom => $cfGejala): ?>
                        <tr>
                            <td><?= $symptom ?></td>
                            <td><?= $symptoms[$symptom] ?></td>
                            <td><?= $_POST['cf_user'][$symptom] ?></td>
                            <td><?= number_format($cfGejala, 2) ?></td>
                            <td><?= number_format($cfCombinationValues[$symptom], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="result">
                <h2>Hasil Akhir</h2>
                <p>CF Final: <?= number_format($finalCF, 5) ?></p>
                <p>Persentase Keyakinan: <?= number_format($confidencePercentage, 2) ?>%</p>
                <p>Berdasarkan hasil, tingkat keyakinan bahwa Anda mengalami 
                    <strong>
                    <?= $confidencePercentage >= 50 ? "Demam Berdarah" : "Demam Biasa" ?>
                    </strong> 
                    adalah <strong><?= number_format($confidencePercentage, 2) ?>%</strong>.
                </p>
            </div>
        <?php endif; ?>
        <div class="logout">
            <a href="?logout=true">Logout</a>
        </div>
    </div>
</body>
</html>