<?php
require 'koneksi.php';
$nama = $_POST["Nama"];
$password = $_POST["Password"];
$sebagai = $_POST["Sebagai"];
$email = $_POST["Email"];

$query_sql = "INSERT INTO tbl_user (Nama, Password, Sebagai, Email)
                VALUES ('$nama', '$password', '$sebagai', 'email')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}