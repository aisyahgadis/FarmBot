<?php
// $session_start to login or daftar
include "../database/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tampilan login</title>
    <link rel="stylesheet" href="../../css/cssfam.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
session_start();
include "../database/config.php"; 

if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; 
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data;
            echo '<script>alert("Selamat datang, ' . $data['nama'] . '"); location.href="index.php";</script>';
        } else {
            echo '<script>alert("Username/password tidak sesuai.");</script>';
        }
    } else {
        echo '<script>alert("Username/password tidak sesuai.");</script>';
    }
}
?>
    <div class="wrapper">
        <form action="../tampilan/farmbot.php">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username"
                required>
                <i class='bx bxs-user'></i><br><br>
            </div>
            <div class="input-box">
                <input type="password" placeholder="password"
                required>
                <i class='bx bxs-lock-alt'></i><br><br>
            </div> 
                <button type="submit" class="btn">Login</a></button>
            <div class="register-link">
                <p>Tidak punya akun? 
                    <a href="daftar.php">Daftar</a></p>
            </div>
        </form>
    </div>
</body>
</html>