<?php
    session_start();
    include '../database/config.php';

    //jika user belum login dan menuju halaman lain
    if (!isset($_SESSION['id_user'])) {
        echo '
        <script>
            alert("Silakan login terlebih dahulu.");
            window.location.href = "user.php";
        </script>';
        exit;
    }
    $nama_tanaman = '';
    $cara_perawatan = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_tanaman = $_POST['nama_tanaman'] ?? '';

        // Cari cara perawatan dari database berdasarkan nama tanaman yang diinput
        $sql = "SELECT cara_perawatan FROM rawat WHERE nama_tanaman LIKE ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        // Tambahkan wildcard % untuk LIKE
        $search = "%$nama_tanaman%";

        $stmt->bind_param("s", $search);
        $stmt->execute();
        $stmt->bind_result($cara_perawatan);
        
        if ($stmt->fetch()) {
            // $cara_perawatan terisi dari database
        } else {
            $cara_perawatan = "Cara perawatan belum tersedia untuk tanaman ini.";
        }
        $stmt->close();
    }
    if (isset($_POST['simpan'])) {
        $user_id = $_SESSION['userweb']['id_user'];
        $nama_tanaman = $_POST['nama_tanaman'];
        $cara_perawatan = $_POST['cara_perawatan'];

        $insert = "INSERT INTO perawatan (id_user, nama_tanaman, cara_perawatan)  VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("iss", $user_id, $nama_tanaman, $cara_perawatan);
        if ($stmt->execute()) {
        echo "<script>alert('Berhasil disimpan.');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
          $stmt->close();
    }

    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Budidaya Tanaman</title>
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
        input[type="number"] {
            padding: 10px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 10px;
        }
        input[type="m2"] {
            padding: 10px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 45px;
        }
        input[type="float"] {
            width: 35%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 20px;
        }
        input[type="rp"] {
            padding: 10px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 10px;
        }
        input[type="image"] {
            width: 100%;
            max-width: 300px;
            display: block;
            margin: 10px auto;
            border-radius: 5px;
        }
        .tanam {
            margin-bottom: 250px;
        }
        input[type="total"] {
            padding: 10px;
            border: 1px solid #100101;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 1000px;
            align-items: left;
        }
        h6 {
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
            font-weight: 800;
            font-size: 30px;
            color: #04613e;
            width: 100%;  
            line-height: 0.1px;
            text-align: flex; 
            margin: 0 auto 30px auto;
        }
        .out {
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
            font-weight: 800;
            font-size: 30px;
            color: #04613e;
            width: 100%;  
            line-height: 0.1px;
            text-align: flex;
            margin-top: 2%;
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
        .icer label {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 16px;
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
        .logout-btn {
        margin-left: auto;
        color: white;
        text-decoration: none;
        font-weight: bold;
        padding: 5px 10px;
        background-color:rgb(204, 204, 2);
        border-radius: 5px;
        transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
        background-color:rgb(171, 154, 4);
        }
    </style>
</head>
<body>
        <section class home>
            <div class="navbar">
                <label class="logo"><a href="">FARMBOT</a></label>
                <ul>
                    <li><a href="farmbot.php#content">Home</a></li>
                    <li><a href="produktivitas.php">Produktivitas</a></li>
                    <li><a href="#perawatan">Perawatan</a></li>
                    <li><a href="penjagaan.php">Penjagaan</a></li>
                    <li><a href="farmbot.php#informasi">Informasi</a></li>
                    <a href="../login/logout.php" class="logout-btn">Logout</a>
                    <a href="../login/edit.php" class="logout-btn">Edit</a>
                </ul>
            </div>
        </section> 
    <section id="perawatan" class="icer">
    <section>
        <div id="perawatan" >
            <h2>Simulasi Budidaya Tanaman</h2>
                <form action="./perawatan.php" method="post">
                    <label>Nama Tanaman:</label><br>
                    <input type="text" name="nama_tanaman" value="<?= htmlspecialchars($nama_tanaman) ?>" required>
                    <button type="submit" name="submit" ><span></span>Cari</button><br><br>
                    <label>Cara Perawatan:</label><br>
                    <textarea name="cara_perawatan" rows="6" cols="50" class="input-deskripsi" readonly><?= htmlspecialchars($cara_perawatan) ?></textarea><br><br>
                    <div class="button-row">
                        <a href="perawatan.php"><button type="button"><span></span>Refresh</a></button>
                        <button type="submit" name="simpan" id="save"><span></span>Simpan</button>
                    </div>
                </form>
        </div>
        </div>
    </section>
</body>
</html>