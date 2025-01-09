<?php
include "koneksi.php";
$session_start
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ke web</title>
</head>
<body>
    <?php
        if(isset($_POST['username'])){
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $query = mysqli_query($koneksi,"Insert into user(nama,user,password)
             values('$nama','$username','$password')");
             if($query){
                echo'<script>alert("selamat, pendataran anda berhasil. silahkan login.")</script>';
             }else{
                echo'<script>alert("maaf pendaftaran gagal.")</script>';
             }
             
        }
    ?>
    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Pendaftaran User</h3>
                </td>
            </tr>
            <tr>
                <td>nama</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar User</button>
                    <a href="login.php">Login </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>