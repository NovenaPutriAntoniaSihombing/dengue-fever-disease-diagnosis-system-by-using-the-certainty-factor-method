<?php
$host = 'localhost'; // Host database
$db = 'db_register'; // Nama database
$user = 'root';      // Username database
$pass = '';          // Password database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
