<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #add8e6, #dda0dd, #ffb6c1); /* Gradasi biru, ungu, pink */
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #4b0082; /* Ungu gelap */
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 30px;
            color: #555;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #ff6b6b; /* Warna merah muda */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e55b5b; /* Merah lebih gelap */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Anda telah keluar</h1>
        <p>Terima kasih telah menggunakan aplikasi kami.</p>
        <a href="login.php">Kembali ke Login</a>
    </div>
</body>
</html>
