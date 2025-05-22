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
        .icer label {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 16px;
        }
        .icer label[for="haha"] {
            margin-left: 970px;
        }
        .icer label[for="vs"] {
            margin-left: 30%;
        }
        .icer button[type=button] {
            margin-left: 90%;
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
        
    </style>
</head>
<body>
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
                <li><a href="#produktivitas">Produktivitas</a></li>
                <li><a href="perawatan.php">Perawatan</a></li>
                <li><a href="penjagaan.php">Penjagaan</a></li>
                <li><a href="farmbot.php#informasi">Informasi</a></li>
            </ul>
          </div> 
    <section id="penanaman" class="icer">
        <?php
            include '../database/config.php'; 

            // echo isset($_POST['hitung']);

            if(isset($_POST['hitung'])) {
                $luas_ubin = isset($_POST['luas_ubin']) ? $_POST['luas_ubin'] : 0;
                $hasil_panen = isset($_POST['hasil_panen']) ? $_POST['hasil_panen'] : 0;
                $produktivitas_kg_ha = ($hasil_panen / $luas_ubin) * 10000; // 1 hektar = 10,000 m²
                $produktivitas_ton_ha = $produktivitas_kg_ha / 1000; // Konversi ke ton per hektar

                if ($produktivitas_kg_ha && $produktivitas_ton_ha) {
                    echo "<script>alert('Berhasil Dihitung')</script>";
                } else {
                    echo "Error Perhitungan"; 
                }
            }

            if (isset($_POST['simpan'])) {
                $luas_ubin = $_POST['luas_ubin'];
                $hasil_panen = $_POST['hasil_panen'];
                $produktivitas_kg_ha = $_POST['produktivitas_kg_ha']; // 1 hektar = 10,000 m²
                $produktivitas_ton_ha = $_POST['produktivitas_ton_ha']; // Konversi ke ton per hektar

                $sql = "INSERT INTO produktivitas (luas_ubin, hasil_panen, produktivitas_kg_ha, produktivitas_ton_ha) 
                        VALUES ('$luas_ubin', '$hasil_panen', '$produktivitas_kg_ha', '$produktivitas_ton_ha')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Berhasil Disimpan')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error; 
                }
            }
        ?>
        <div id="produktivitas" >
            <h2>Simulasi Budidaya Tanaman</h2>
            <form action="./produktivitas.php" method="post" id="hitung">
                <h6>Input</h6>
                <div>
                    <label>Luas tanah ubinan (m2):</label>
                    <input type="m2" placeholder="Bilangan berdasarkan luas m2" name="luas_ubin" 
                        value="<?php echo isset($luas_ubin) ? $luas_ubin : ''; ?>"><br><br>
                </div>
                <div>
                    <label>Hasil panen dalam satu Ubin:</label>
                    <input type="number" placeholder="Bilangan dalam satuan kg" name="hasil_panen"
                    value="<?php echo isset($hasil_panen) ? $hasil_panen : ''; ?>">
                </div>
                <button type="submit" name="hitung"><span></span>Hitung</button>
                
            <h6 class="out">Output</h6>
                <div>
                    <label>Hasil Produktivitas:</label>
                    <input type="number" placeholder="dalam bentuk Kg/Ha" name="produktivitas_kg_ha" readonly 
                        value="<?php echo isset($produktivitas_kg_ha) ? $produktivitas_kg_ha : ''; ?>"><br><br>
                </div>  
                <div>
                    <label>Hasil Produktivitas:</label>
                    <input type="number" placeholder="dalam bentuk Ton/Ha" name="produktivitas_ton_ha" readonly 
                        value="<?php echo isset($produktivitas_ton_ha) ? $produktivitas_ton_ha : ''; ?>">
                </div>

                <div class="button-row">
                    <a href="produktivitas.php"><button type="button"><span></span>Refresh</a></button>
                    <button type="submit" id="save" name="simpan"><span></span>Simpan</button>
                </div>
            </form>
    </section>
</body>
</html>
