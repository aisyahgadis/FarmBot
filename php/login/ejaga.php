<?php
include '../database/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //  Ambil data dari form dengan validasi
    $ID = isset($_POST['id_penjagaan']) ? $_POST['id_penjagaan'] : '';
    $nama_hama = isset($_POST['nama_hama']) ? $_POST['nama_hama'] : '';
    $jenis_tips = isset($_POST['jenis_tips']) ? $_POST['jenis_tips'] : '';
    $penangakl = isset($_POST['penangkal']) ? $_POST['penangkal'] : '';
    
    // Periksa apakah semua variabel ada sebelum update
    if (!empty($nama_hama) && !empty($jenis_tips) && !empty($penangakl)) {
        // Query UPDATE
        $sql = "UPDATE penjagaan SET 
                    nama_hama = '$nama_hama', 
                    jenis_tips = '$jenis_tips',
                    penangkal = '$penangkal',
                WHERE id_penjagaan = '$id'";

        // Jalankan query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../database/jaga.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Ada data yang kosong. Pastikan semua field terisi!";
    }
}


    // Query untuk mengambil data user berdasarkan ID
    $sql = "SELECT * FROM penjagaan WHERE id_penjagaan = '$id'";
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
    <link rel="stylesheet" href="../../css/jaga.css">
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Edit Penjagaan</h1>      
            <input type="hidden" name="id_penjagaan" value="<?php echo isset($row['id_penjagaan']) ? htmlspecialchars($row['id_penjagaan']) : ''; ?>">
            <div class="input-box">
                Nama hama: <input type="text" name="nama" value="<?php echo isset($row['nama_hama']) ? htmlspecialchars($row['nama_hama']) : ''; ?>" required><br><br>
            </div>
            <div class="input-box">
                <label for="jenis_tips">Jenis Tips:</label>
                <select name="jenis_tips" name="jenis_tips">
                <option value="">Pilih Jenis Tips</option>
                <option value="Pencegahan" <?php echo (isset($row['jenis_tips']) && $row['jenis_tips'] == 'Pencegahan') ? 'selected' : ''; ?>>Pencegahan</option>
                <option value="Penanganan" <?php echo (isset($row['jenis_tips']) && $row['jenis_tips'] == 'Penanganan') ? 'selected' : ''; ?>>Penanganan</option>
                </select>
            </div>
             <div class="input-box">
               <label for="deskripsi">penangkal:</label><br>
                    <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"><?php echo isset($row['cara_perawatan']) ? htmlspecialchars($row['cara_perawatan']) : ''; ?></textarea><br><br>
            </div>
            <button type="submit" class="btn">Update</button><br>
        </form>
            <p>Tidak ada yang perlu diperbarui?<a href="../database/jaga.php">Kembali</a></p>
</body>
</html>