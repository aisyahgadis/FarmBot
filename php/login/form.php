<?phpAdd commentMore actions
session_start();
include "../database/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM userweb WHERE username='$username'");

    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        if ($password == $data['password']) {
    $_SESSION['userweb'] = $data;
    $_SESSION['id_user'] = $data['id_user'];
    echo '<script>alert("Selamat datang, ' . $data['username'] . '"); window.location.href = "../tampilan/farmbot.php";</script>';
    exit;
    } else {
        echo '<script>alert("Password salah.");</script>';
    }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/cssfam.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i><br><br>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i><br><br>
            </div> 
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Tidak punya akun? <a href="daftar.php">Daftar</a></p>
            </div>
        </form>
    </div>
</body>
</html>