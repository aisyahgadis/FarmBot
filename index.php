<?php
//inisialisasi session
session_start();
// mengecek apakah ada session user yang aktif, jika arahkan ke login.php
if(!isset($_SESSION['user'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body style="text-align:center">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
    <h1>Halaman Login</h1>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <hr>
    <h3>Selamat Datang, User FarmBot</h3>
     halaman ini akan tampil setelah user login
</body>
</html>