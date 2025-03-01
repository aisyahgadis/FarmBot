<?php
include 'config.php'; // Pastikan file koneksi database sudah benar

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //  Ambil data dari form dengan validasi
    $ID = isset($_POST['id_user']) ? $_POST['id_user'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
    $no_handphone = isset($_POST['no_handphone']) ? $_POST['no_handphone'] : '';
    $email = isset ($_POST['email'])? $_POST['email'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Periksa apakah semua variabel ada sebelum update
    if (!empty($nama) && !empty($tanggal_lahir) && !empty($no_handphone) && !empty($email) && !empty($pass)) {
        // Query UPDATE
        $sql = "UPDATE userweb SET 
                    nama = '$nama', 
                    tanggal_lahir = '$tanggal_lahir',
                    no_handphone = '$no_handphone',
                    email = '$email',
                    password = '$pass'
                WHERE id_user = '$id'";

        // Jalankan query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Ada data yang kosong. Pastikan semua field terisi!";
    }
}


    // Query untuk mengambil data user berdasarkan ID
    $sql = "SELECT * FROM userweb WHERE id_user = '$id'";
    $result = mysqli_query($conn, $sql);

    // Debug: Cek apakah query berhasil
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Debug: Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Error: Data pengguna tidak ditemukan di database!");
    }
} else {
    die("Error: ID tidak valid atau tidak diberikan!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="../css/edit1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Edit Pengguna</h1>      
            <input type="hidden" name="id_user" value="<?php echo isset($row['id_user']) ? htmlspecialchars($row['id_user']) : ''; ?>">
            <div class="input-box">
                Nama: <input type="text" name="nama" value="<?php echo isset($row['nama']) ? htmlspecialchars($row['nama']) : ''; ?>" required><br><br>
                <i class='bx bxs-user'></i><br><br>
            </div>
            <div class="input-box">
                Tanggal_lahir: <input type="date" name="tanggal_lahir" value="<?php echo isset($row['tanggal_lahir'])?htmlspecialchars($row['tanggal_lahir']) : '';?>"><br><br>
            </div>
            <div class="input-box">
                No_handphone: <input type="text" name="no_handphone" value="<?php echo isset($row['no_handphone']) ? htmlspecialchars($row['no_handphone']) : ''; ?>" required><br><br>
                <i class='bx bxs-phone'></i><br><br>
            </div>
            <div class="input-box">
                Email: <input type="email" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>" required><br><br>
                <i class='bx bxs-envelope'></i><br><br>
            </div>
            <div class="input-box">
                Password: <input type="password" name="password" value="<?php echo isset($row['password']) ? htmlspecialchars($row['password']) : ''; ?>" required><br><br>
                <i class='bx bxs-lock-alt'></i><br><br>
            </div>
            <button type="submit" class="btn">Update</button><br>
        </form>
            <p>Tidak ada yang perlu diperbarui?<a href="index.php">Kembali</a></p>
</body>
</html>