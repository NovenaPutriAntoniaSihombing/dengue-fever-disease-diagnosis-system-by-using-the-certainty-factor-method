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

// Proses form
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Query untuk menyimpan data ke tabel users
    $sql = "INSERT INTO users (username, email, gender, birth_date, password) 
            VALUES ('$username', '$email', '$gender', '$birth_date', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Pendaftaran berhasil, arahkan pengguna ke halaman login
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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

        form input, form select, form button {
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

        <!-- Bagian kanan untuk form register -->
        <div class="right-section">
            <h2>Daftar akun</h2>
            <p>Masukkan data diri anda untuk mendaftar</p>
            <!-- Form dengan method POST -->
            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Nama pengguna" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <select name="gender" required>
                    <option value="" disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="date" name="birth_date" required>
                <input type="password" name="password" placeholder="Password" required>
                <label>
                    <input type="checkbox" onclick="togglePassword()"> Lihat Password
                </label>
                <button type="submit" name="register">DAFTAR</button>
            </form>
            <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
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
