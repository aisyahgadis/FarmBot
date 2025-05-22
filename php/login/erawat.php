<?php
include '../database/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //  Ambil data dari form dengan validasi
    $ID = isset($_POST['id_perawatan']) ? $_POST['id_perawatan'] : '';
    $nama_tanaman = isset($_POST['nama_tanaman']) ? $_POST['nama_tanaman'] : '';
    $cara_perawatan = isset($_POST['cara_perawatan']) ? $_POST['perawatan'] : '';
    
    // Periksa apakah semua variabel ada sebelum update
    if (!empty($nama_tanaman) && !empty($cara_perawatan)) {
        // Query UPDATE
        $sql = "UPDATE perawatan SET 
                    nama_tanaman = '$nama_tanaman', 
                    cara_perawatan = '$cara_perawata ',
                WHERE id_perawatan = '$id'";

        // Jalankan query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../database/rawat.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Ada data yang kosong. Pastikan semua field terisi!";
    }
}


    // Query untuk mengambil data user berdasarkan ID
    $sql = "SELECT * FROM perawatan WHERE id_perawatan = '$id'";
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
    <link rel="stylesheet" href="../../css/rawat.css">
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Edit Perawatan</h1>      
            <input type="hidden" name="id_perawatan" value="<?php echo isset($row['id_perawatan']) ? htmlspecialchars($row['id_perawatan']) : ''; ?>">
            <div class="input-box">
                Nama tanaman : <input type="text" name="nama" value="<?php echo isset($row['nama_tanaman']) ? htmlspecialchars($row['nama_tanaman']) : ''; ?>" required><br><br>
            </div>
            <div class="input-box">
               <label for="deskripsi">Cara Perawatan:</label><br>
                    <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"><?php echo isset($row['cara_perawatan']) ? htmlspecialchars($row['cara_perawatan']) : ''; ?></textarea><br><br>
            </div>
            <button type="submit" class="btn">Update</button><br>
        </form>
            <p>Tidak ada yang perlu diperbarui?<a href="../database/rawat.php">Kembali</a></p>
</body>
</html>