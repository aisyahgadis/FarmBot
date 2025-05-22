<?php
include '../database/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //  Ambil data dari form dengan validasi
    $ID = isset($_POST['id_produktivitas']) ? $_POST['id_produktivitas'] : '';
    $luas_ubin = isset($_POST['luas_ubin']) ? $_POST['luas_ubin'] : '';
    $hasil_panen = isset($_POST['hasil_panen']) ? $_POST['hasil_panen'] : '';
    $produktivitas_kg_ha = isset($_POST['produktivitas_kg_ha']) ? $_POST['produktivitas_kg_ha'] : '';
    $produktivitas_ton_ha = isset ($_POST['produktivitas_ton_ha'])? $_POST['produktivitas_ton_ha'] : '';
    $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';
    
    // Periksa apakah semua variabel ada sebelum update
    if (!empty($luas_ubin) && !empty($hasil_panen) && !empty($produktivitas_kg_ha) && !empty($produktivitas_ton_ha) ) {
        // Query UPDATE
        $sql = "UPDATE produktivitas SET 
                    luas_ubin = '$luas_ubin', 
                    hasil_panen = '$hasil_panen',
                    produktivitas_kg_ha = '$produktivitas_kg_ha',
                    produktivitas_ton_ha = '$produktivitas_ton_ha',
                WHERE id_produktivitas = '$id'";

        // Jalankan query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../database/user.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Ada data yang kosong. Pastikan semua field terisi!";
    }
}


    // Query untuk mengambil data user berdasarkan ID
    $sql = "SELECT * FROM produktivitas WHERE id_produktivitas = '$id'";
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
    <link rel="stylesheet" href="../../css/edit1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Edit Produktivitas</h1>      
            <input type="hidden" name="id_produktivitas" value="<?php echo isset($row['id_produktivitas']) ? htmlspecialchars($row['id_produktivitas']) : ''; ?>">
            <div class="input-box">
                luas tanah ubinan (m2): <input type="text" name="nama" value="<?php echo isset($row['luas_ubin']) ? htmlspecialchars($row['luas_ubin']) : ''; ?>" required><br><br>
            </div>
            <div class="input-box">
                Hasil panen satu ubin: <input type="text" name="tanggal_lahir" value="<?php echo isset($row['hasil_panen'])?htmlspecialchars($row['hasil_panen']) : '';?>"><br><br>
            </div>
            <div class="input-box">
                hasil produktivitas (kg): <input type="text" name="email" value="<?php echo isset($row['produktivitas_kg_ha']) ? htmlspecialchars($row['produktivitas_kg_ha']) : ''; ?>" required><br><br>
            </div>
            <div class="input-box">
                Hasil produktivitas (ton) <input type="text" name="password" value="<?php echo isset($row['produktivitas_ton_ha']) ? htmlspecialchars($row['produktivitas_ton_ha']) : ''; ?>" required><br><br>
            </div>
            <button type="submit" class="btn">Update</button><br>
        </form>
            <p>Tidak ada yang perlu diperbarui?<a href="../database/tanam.php">Kembali</a></p>
</body>
</html>