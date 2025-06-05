<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_handphone = $_POST['no_handphone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO userweb (nama, username, tanggal_lahir, no_handphone, email, password)
    VALUES ('$nama','$username', '$tanggal_lahir', '$no_handphone', '$email', '$pass');";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../database/index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Tambahkan $sql untuk debugging
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="../../css/daftar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="daftar.php" method="POST">
            <h1>Tambah pengguna</h1>
            <div class="input-box">
                <input type="text" name="nama" placeholder="nama"
                required>
                <i class='bx bxs-user'></i><br><br>
            </div>
             <div class="input-box">
                <input type="text" name="username" placeholder="Username"
                required>
                <i class='bx bxs-user'></i><br><br>
            </div>
            <div class="input-box">
                <input type="date" name="tanggal_lahir"placeholder="Tanggal Lahir"
                required>
            <div class="input-box">
                <input type="tel" name="no_handphone"placeholder="No Handphone"
                required>
                <i class='bx bxs-phone'></i><br><br>
            </div>
            <div class="input-box">
                <input type="email" name="email"placeholder="Email"
                required>
                <i class='bx bxs-envelope'></i><br><br>
            </div>
            <div class="input-box">
                <input type="password" name="password"placeholder="Password"
                required>
                <i class='bx bxs-lock-alt'></i><br><br>
            </div> 
                <button type="submit" class="btn">Daftar<a href=" ../php/tampilan/farmbot.php"></a></button><br>
                <p>Sudah Punya akun?
                <a href="form.php">Login</a></p>
        </form>
    </div>
</body>
</html>