<?php
session_start();
$host = 'localhost';
$db   = 'e_learning';
$user = 'root'; // atau username sesuai database
$pass = ''; // password MySQL (kosong jika default)

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah kedua field telah diisi
    if (isset($_POST['nama']) && isset($_POST['password'])) {
        $username = $conn->real_escape_string($_POST['nama']);
        $password = $conn->real_escape_string($_POST['password']);
        
        // Query untuk cek username dan password
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login sukses
            $_SESSION['nama'] = $username;
            header("Location: admin.html"); // Ganti dengan halaman dashboard setelah login
            exit();
        } else {
            // Login gagal, redirect ke login.html dengan pesan error
            header("Location: login.html?error=wrong_credentials");
            exit();
        }
    } else {
        // Jika field tidak diisi
        header("Location: login.html?error=empty_fields");
        exit();
    }
}
?>
