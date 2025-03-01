<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dengan validasi
    $nama = ($_POST['nama']);
    $tanggal_lahir = ($_POST['tanggal_lahir']);
    $no_handphone = ($_POST['no_handphone']);
    $email = ($_POST['email']);
    $password = ($_POST['password']); // Hash password

    $sql = "INSERT INTO userweb (nama, tanggal_lahir, no_handphone, email, password) 
            VALUES ('$nama', '$tanggal_lahir', '$no_handphone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pengguna berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="../css/daftar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Tambah pengguna</h1>
            <div class="input-box">
                <input type="text" placeholder="Username"
                required>
                <i class='bx bxs-user'></i><br><br>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Tanggal Lahir"
                required>
            <div class="input-box">
                <input type="tel" placeholder="No Handphone"
                required>
                <i class='bx bxs-phone'></i><br><br>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email"
                required>
                <i class='bx bxs-envelope'></i><br><br>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password"
                required>
                <i class='bx bxs-lock-alt'></i><br><br>
            </div> 
                <button type="submit" class="btn">Simpan</button><br>
                <p>Sudah Punya akun?
                <a href="form.php">Login</a></p>
        </form>
    </div>
</body>
</html>
