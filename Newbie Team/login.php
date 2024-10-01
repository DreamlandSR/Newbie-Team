<?php
require 'koneksi.php';

$nama = $_POST["nama"];
$password = $_POST["password"];

// Validate user input (e.g., check if nama and password are not empty)

$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE nama = ? AND password = ?");
$stmt->bind_param("ss", $nama, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: admin.html");
    exit();
} else {
    echo "<center><h1>Email atau password anda salah.</h1>
    <button><strong><a href='login.php'>Login</a></strong></button></center>";
}