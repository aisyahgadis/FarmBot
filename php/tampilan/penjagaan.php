<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penjagaan</title>
    <style>
        html {
            scrollbar-width: smooth;
        }
        .banner {
            width: 100%;
            height: 100vh;
            background-image: url("../../img/ukll.jpg");
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
        .navbar {
            position: fixed;
            top: 0; 
            width: 90%;
            padding: 1rem 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            background-color:#024d2f;
        }
        .logo a{
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
            width: 120px;
            font-size: 25px;
            color: rgb(255, 255, 255);
            text-shadow: 1px 1px 5px #000000;
        }
        .navbar ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }
        .navbar ul li a{
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            color: rgb(242, 245, 245); 
            text-transform: uppercase;
            text-shadow: 2px 2px 4px #000000;
        }
        .navbar ul li::after{
            content: '';
            height: 3px;
            width: 0;
            background: #e2e6e4;
            position: absolute;
            left: 0;
            bottom: -10px;
            transition: 02s;
        }
        .navbar ul li:hover::after {
            width: 100%;
            text-decoration: underline;
        }
        .navbar ul li:hover  .dropdown {
                display: block;
        }
        .navbar ul li .dropdown {
            display: none;
            position: absolute;
            top: 100%; 
            left: 0;
            background: #075e2e;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar ul li .dropdown a {
            display: block;
            padding: 10px 20px;
            color: rgb(242, 245, 245); 
            text-decoration: none;
            text-shadow: none;
            white-space: nowrap;
        }
        .navbar ul li .dropdown a:hover {
            background: #04613e;
        }
        h2 {
        font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        font-weight: 800;
        font-size: 45px;
        margin-top: 10%;
        color: #04613e;
        width: 100%;  
        line-height: 50px;
        text-align: center;
        }
        label {
            display: inline-block;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 16px;
        }
        input[type="haha"] {
            width: 70%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 150px;
        }
        input[type="text"] {
            width: 35%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 20px;
        }
        input[type="hama"] {
            width: 35%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 40px;
        }
        select {
            width: 35%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 20px;
        }
        button {
            width: 100px;
            padding:  10px 0;
            text-align: center;
            margin: 20px;
            border-radius: 25px ;
            font-weight: bold;
            border: 2px solid #024d2f;
            background-color: transparent;
            color: rgb(245, 237, 10);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        a{
            color: rgb(245, 237, 10);
            text-decoration: none;
        }
        span {
            background: #04613e;
            height: 100%;
            width: 0;
            border-radius: 25px;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index:-1 ;
            transition: 0.5s;
        }
        button:hover span{
            width: 100%;
        }
        button:hover {
            border: none;
        }
        .input-deskripsi {
        width: 50%;           
        height: 150px;        
        padding: 10px; 
        margin-top: 5px;
        margin-left: 20px;        
        font-size: 16px;       
        border: 1,5px solid rgb(0, 0, 0);
        border-radius: 5px;    
        resize: vertical;      
        box-sizing: border-box;
        }
    </style>
</head>
<body>
    <section class home>
            <div class="navbar">
                <label class="logo"><a href="">FARMBOT</a></label>
                <ul>
                    <li><a href="farmbot.php#content">Home</a></li>
                    <li>
                        <a href="#">About</a>
                        <ul class="dropdown">
                            <li><a href="farmbot.php#about-web">About web</a></li>
                            <li><a href="farmbot.php#about-me">About me</a></li>
                            <li><a href="farmbot.php#visi-misi">VisiMisi</a></li>
                        </ul>
                    </li>
                    <li><a href="produktivitas.php">Produktivitas</a></li>
                    <li><a href="perawatan.php">Perawatan</a></li>
                    <li><a href="#penjagaan">Penjagaan</a></li>
                    <li><a href="farmbot.php#informasi">Informasi</a></li>
                </ul>
            </div>
    </section> 
    <section id="penjagaan" class="jaga">
    <?php
    include '../database/config.php';

    $nama_hama = '';
    $jenis_tips = '';
    $penangkal = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_hama = $_POST['nama_hama'] ?? '';
        $jenis_tips = $_POST['jenis_tips'] ?? '';

        $sql = "SELECT penangkal FROM jaga WHERE nama_hama LIKE ? AND jenis_tips = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        // Gunakan LIKE untuk fleksibilitas input nama_hama
        $search = "%$nama_hama%";
        $stmt->bind_param("ss", $search, $jenis_tips);
        $stmt->execute();
        $stmt->bind_result($penangkal);

        if (!$stmt->fetch()) {
            $penangkal = "Data penangkal belum tersedia untuk kombinasi ini.";
        }

        $stmt->close();
    }
     if (isset($_POST['simpan'])) {
        $nama_hama = $_POST['nama_hama'];
        $jenis_tips = $_POST['jenis_tips'];
        $penangkal = $_POST['penangkal'];

        $insert = "INSERT INTO penjagaan (nama_hama, jenis_tips, penangkal) 
        VALUES ('$nama_hama', '$jenis_tips', '$penangkal')";
        if ($conn->query($insert) === TRUE) {
                    echo "<script>alert('Berhasil Disimpan')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error; 
                }
    }
    $conn->close();
    ?>

    <section>
        <div id="penjagaan" >
            <h2>Simulasi Budidaya Tanaman</h2>
                <form  action="./penjagaan.php" method="POST">
                    <label>Hama:</label><br>
                    <input type="text" name="nama_hama" value="<?= htmlspecialchars($nama_hama) ?>" required><br><br>
                    <label>Jenis Tips:</label><br>
                    <select name="jenis_tips" required>
                        <option value="">Pilih Jenis Tips</option>
                        <option value="Pencegahan" <?= ($jenis_tips == 'Pencegahan') ? 'selected' : '' ?>>Pencegahan</option>
                        <option value="Penanganan" <?= ($jenis_tips == 'Penanganan') ? 'selected' : '' ?>>Penanganan</option>
                    </select>
                    <button type="submit"><span></span>Cari</button><br><br>
                    <label>Penangkal:</label><br>
                    <textarea name="penangkal" rows="6" cols="50" class="input-deskripsi" readonly><?= htmlspecialchars($penangkal) ?></textarea><br><br>
                    <div class="button-row">
                        <a href="penjagaan.php"><button type="button"><span></span>Refresh</a></button>
                        <button type="submit" name="simpan" id="save"><span></span>Simpan</button>
                    </div>
                </form>
        </div>
    </section>
</body>
</html>