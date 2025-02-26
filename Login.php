<?php
// Koneksi ke database
$host = 'localhost';  // Host database
$db = 'db_register';  // Nama database
$user = 'root';       // Username database
$pass = '';           // Password database

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, cek password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login berhasil, alihkan ke halaman JCF.php
            header("Location: JCF.php");
            exit();
        } else {
            // Password salah
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        // Pengguna tidak ditemukan
        echo "<script>alert('Pengguna tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
        }

        /* Bagian kiri dengan logo penuh */
        .left-section {
            flex: 1;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .left-section img {
            width: 100%; /* Logo memenuhi lebar container */
            height: auto; /* Menjaga rasio logo */
            object-fit: contain; /* Memastikan logo tidak terpotong */
        }

        /* Bagian kanan untuk form */
        .right-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input, form button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #e55b5b;
        }

        a {
            color: #ff6b6b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Bagian kiri untuk logo penuh -->
        <div class="left-section">
            <img src="Logo.jpg" alt="Logo Rumah Sakit">
        </div>

        <!-- Bagian kanan untuk form login -->
        <div class="right-section">
            <h2>Masuk ke akun</h2>
            <p>Masukkan email dan password Anda</p>
            <!-- Form dengan method POST -->
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Password" required>
                <label>
                    <input type="checkbox" onclick="togglePassword()"> Lihat Password
                </label>
                <button type="submit" name="login">MASUK</button>
            </form>
            <p>Belum punya akun? <a href="register.php">Daftar</a></p>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan/menyembunyikan password
        function togglePassword() {
            const passwordField = document.querySelector('input[name="password"]');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
