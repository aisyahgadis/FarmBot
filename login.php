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
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($koneksi,"SELECT*FROM user where username='username'and password='$password'");
        if(mysqli_num_rows($query)>0){
            $data = mysqli_fetch_array($query);
            $_SESSION['user'] = $data;
            echo'<script>alert("selamat datang, '.$data['nama'].'");
                location.href="index.php";</script>';
        }else{
            echo '<script>alert("usename/passwors tidak sesuai.");</script>';
        }
    }
    ?>
    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login User</h3>
                </td>
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
                    <button type="submit">Login</button>
                    <a href="daftar.php">Daftar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>