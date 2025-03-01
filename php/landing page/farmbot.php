<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmBot</title>
    <style>
        html {
            scrollbar-width: smooth;
        }
        .banner {
            width: 100%;
            height: 100vh;
            background-image: url("../img/ukll.jpg");
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
        .content {
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: rgb(248, 248, 248);
            text-align: center;
        }
        .content h1 {
            font-size: 50px;
            margin-top: 10px;
            text-shadow: 2px 2px 5px #000000;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .content p {
            text-align:center;
            color: #e2e6e4;
            line-height: 1.6;
            margin: 20px auto;
            font-weight: bold;
            line-height: 2px;
            text-shadow: 2px 2px 5px #000000;
            font-family: 'Times New Roman', Times, serif;
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
        section{
            margin: auto;
            margin-bottom: 50px;
        }
        .kolom .deskripsi{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 30px;
            width: 500px;
            font-weight: bold;
            text-align: center;
            margin-left: 30%;
        }
        .kolom {
            margin-top: 700px;
        }
        .kolom:target {
        display: block;
        }
        h2 {
        font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        font-weight: 800;
        font-size: 45px;
        margin-top: 5%;
        color: #04613e;
        width: 100%;  
        line-height: 50px;
        text-align: center;
        }
        p{
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: left;
            color: #170101;
        }
        h3{
            margin-top: -2%;
            font-size: 20px;
            text-align: center;
            font-size: 30px;
            font-family: Georgia, Times, 'Times New Roman', serif;
        }
        h4{
            margin-bottom: 5%;
            font-size: 20px;
            text-align: center;
            font-size: 30px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        h5{
            font-size: 10px;
            text-align: left;
            font-size: 30px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-bottom: 10px;
        }
        #fitur p{
            text-align:justify;
            line-height: 1.5;
            margin-top: 5px;
            
        }
        #tani {
        width: 35%; 
        height: auto; 
        float: right; 
        text-align: right;
        margin-top: -80px;
        }  
        #tanam {
            width: 35%; 
            height: auto; 
            float: left; 
            text-align: left;
        } 
        #pacul {
            width: 35%; 
            height: auto; 
            float: right; 
            text-align: right;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            margin-top: 150px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            float: left;
            margin-top: 100px;
        }
        .info {
            text-align: right;
            margin-left: 200px;
        }
        .info p {
            font-size: 18px;
        }
        .info strong {
            font-weight: bold;
        }
        .box {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        width: 40%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        float: left;
        margin-top: 120px;
        }
        .misi {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        width: 40%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        float: right;
        margin-top: 120px;
        }
        #web {
            width: 80%;
            height: auto;
            margin-left: 150px;
            margin-right: auto;
        }
        #cari button{
        margin-left: 90%;
        }
        #copyright {
        text-align: center;
        width: 100%;
        padding: 50px 0px 50px 0px;
        margin-top: 50px;
        }
        label {
            display: inline-block;
            width: 150px;
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
            font-size: 18px;
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
    </style>
</head>
<body>
    <nav>
    <div class="banner">
        <div class="navbar">
            <label class="logo"><a href="">FARMBOT</a></label>
            <ul>
                <li><a href="#content">Home</a></li>
                <li>
                    <a href="#">About</a>
                    <ul class="dropdown">
                        <li><a href="#about-web">About web</a></li>
                        <li><a href="#about-me">About me</a></li>
                        <li><a href="#visi-misi">VisiMisi</a></li>
                    </ul>
                </li>
                <li><a href="#penanaman">Penanaman</a></li>
                <li><a href="#">Penjagaan</a></li>
                <li><a href="#">Perawatan</a></li>
                <li><a href="#informasi">Informasi</a></li>
            </ul>
          </div> 
          <!--Home-->
          <section id="Home" >
        <div class="content">
            <h1>Bersama Menuai
                <br>
             Masa Depan Pertanian yang Cerah!</h1>
            <p>Selamat datang di FarmBot,</p>
            <p>Ruang digital yang dirancang khusus untuk Anda,</p>
            <p> para pecinta pertanian dan penggiat agribisnis</p>
         <button type="button"><span></span>See More</button>
         <button type="button"><span></span>Next</button>
        </div>
          </section>
    </div>
    </nav>
    <!--untuk home-->
    <section id="home"></section>
    <!--untukabout-->
    <section id="About">
        <div id="about-web" class="kolom1">
            <br>
            <h2>Website Pertanian</h2>
            <h3>Hi User FarmBot!!</h3>
            <img id="tani" src="../img/gadis.png">
                    <p> Selamat datang di website saya yang bernama FarmBot. Saya akan menjadikan website ini sebagai solusi Bertani Pintar, Efisien, dan Inovatif untuk para petani modern!
                        Website ini dirancang khusus untuk membantu petani mengatasi tantangan dalam bercocok tanam, mengelola sumber daya dengan bijak, dan meningkatkan produktivitas hasil pertanian.
                        FarmBot menghadirkan teknologi terkini seperti sistem otomatisasi, analitik berbasis data, dan panduan personalisasi yang dapat disesuaikan dengan kebutuhan pertanian Anda. Kami percaya bahwa kombinasi antara inovasi dan kearifan lokal dapat menciptakan sistem pertanian yang lebih berkelanjutan, ramah lingkungan, dan menguntungkan.
                        Mari bersama-sama berinovasi dan mengubah cara bertani menjadi lebih mudah, hemat waktu, dan memberikan hasil terbaik untuk masa depan pertanian Indonesia!
                    </p>
                <br>
            <div>
                <div id="about-me" class="container">
                    <img src="../img/profil.jpg" alt="Profile Picture" class="profile-img">
                    <h2>About Me</h2>
                    <div class="info">
                        <p><strong>Nama:</strong> Aisyah Gadis Safira</p>
                        <p><strong>TTL:</strong> Lamongan, 7 Januari 2009</p>
                        <p><strong>Alamat:</strong> Kecamatan. Sambeng, Kabupaten. Lamongan</p>
                        <p><strong>Kelas:</strong> X SIJA 2</p>
                        <p><strong>Jurusan:</strong> SIJA</p>
                        <p><strong>Tema:</strong> Lingkungan dan sumber daya alam</p>
                    </div>
                </div>
                <div id="visi-misi">
                    <div class="box">
                        <h2>Visi</h2>
                        <p>Menjadi platform yang menyediakan simulasi (penanaman, perawatan, dan penjagaan) bertani yang mudah digunakan oleh semua orang dan menyediakan informasi yang akurat terkait bertani.</p>
                    </div>
                </div>
                <div class="misi">
                    <h2>Misi</h2>
                    <ul>
                        <li><strong>Edukasi dan Informasi</strong><br>
                            Menyediakan konten yang akurat, terkini, dan mudah dipahami mengenai teknik penanaman, perawatan tanaman, dan penjagaan hasil panen.
                        </li>
                        <li><strong>Peningkatan Keterampilan</strong><br>
                            Membantu petani dan masyarakat umum mengembangkan keterampilan bertani melalui panduan, pelatihan, dan berbagi pengalaman.
                        </li>
                        <li><strong>Teknologi Pertanian</strong><br>
                            Memperkenalkan dan mempromosikan teknologi modern yang mendukung efisiensi dan keberlanjutan pertanian.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> 
    <section id="Informasi" class="tanam">
        <div id="informasi" class="kolom">
            <h4>Fitur FarmBot</h4>
                    <img id="tanam" src="https://img.freepik.com/free-vector/support-local-farmers-concept_23-2148592676.jpg?uid=R176365365&ga=GA1.1.440308946.1732712039&semt=ais_hybrid">
            <h5>
            Panduan Tanam dan Perawatan:</h5>
            <p>Langkah-langkah praktis dan mudah dipahami untuk menanam berbagai jenis tanaman, dari persiapan lahan hingga panen.</p>
            <h5>Manajemen Keamanan Pertanian:</h5>
            <p>Tips dan trik untuk melindungi tanaman dari hama dan penyakit, serta menjaga kualitas hasil panen.</p>
            <h5>Tes dan Evaluasi:</h5>
            <p>Alat uji sederhana untuk menganalisis kualitas tanah, kebutuhan nutrisi tanaman, dan efisiensi penggunaan bahan bertani.</p>
            <img id="pacul" src="https://img.freepik.com/free-vector/young-farmer-carrying-hoe-work-rice-fields_10045-810.jpg?uid=R176365365&ga=GA1.1.440308946.1732712039&semt=ais_hybrid">
            <h5>Informasi Terkini:</h5>
            <p>Update harga bahan pertanian, rekomendasi pupuk dan bibit, serta solusi alternatif untuk mengurangi biaya tanpa mengorbankan hasil.</p>
            <h5>Kalkulator Modal dan Pengelolaan:</h5>
            <p>Fitur yang membantu petani menghitung kebutuhan bahan dengan akurat sesuai luas lahan, sehingga mencegah pemborosan atau kekurangan.</p>
    </div>
    </section>
    <!--penanaman-->
    <section id="penanaman" class="icer">
        <div id="penanaman" >
            <h2>Simulasi Bercocok Tanam</h2>
            <div>
               <form method="post">
                <div>
                    <label for="vs">Visualisasi:</label>
                    <input type="image" src="https://img.freepik.com/free-vector/gradient-rural-landscape-background_52683-126752.jpg?ga=GA1.1.440308946.1732712039&semt=ais_hybrid">
                </div>
                <div>
                    <input type="haha" placeholder="ayo cari yang kamu butuhkan" name="search">
                    <button type="cari" id="cari"><span></span>Cari</button><br><br>
                </div>
                <div>
                    <label for="size">Pilih Luas Tanah : </label>
                    <input type="text" placeholder="Ayo tentukan luas tanahmu"><br><br>
                </div>
                <div>
                    <label for="bibit">Pilih Jenis Tanaman : </label>
                    <input type="text" placeholder="Ayo tentukan tanamanmu "><br><br>
                </div>
                <div>
                    <label for="bibit">Pilih Jenis Bibit : </label>
                    <input type="text" placeholder="Ayo tentukan bibit tumbuhan terbaikmu ">
                    <input type="number" placeholder="banyak">
                    <input type="rp" min="0" step="1000" placeholder="Rp"><br><br>
                </div>
                <div>
                    <label for="bibit">Pilih jenis Pupuk : </label>
                    <input type="text" placeholder="Ayo tentukan pupuk terbaikmu">
                    <input type="number" placeholder="banyak">
                    <input type="rp" min="0" step="1000" placeholder="Rp"><br><br>
                </div>
                <div>
                    <label for="bibit">Pilih Peralatan : </label>
                    <input type="text" placeholder="Ayo tentukan alat bertanimu">
                    <input type="number" placeholder="banyak">
                    <input type="rp" min="0" step="1000" placeholder="Rp"><br><br>
                </div>
                <div>
                    <label for="haha">Grand Total : </label>
                    <input type="total" placeholder="Total "><br><br>
                </div>
               </form> 
               <button type="button"><span></span>Selanjutnya</button><br><br>
            </div>
        </div>
    </section>
    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>AisyahGadis.</b> Ukl semester ganjil.
        </div>
    </div>
</body>
</html>