<?php
include "config.php"; // Pastikan koneksi ke database sudah ada

$nama = "aisyah";
$tanggal_lahir = "2009-01-07"; // Format YYYY-MM-DD
$no_handphone = "085815508582";
$email = "gadisjpg@gmail.com";
$password = "gadis2009"; 

// Hash password sebelum menyimpan ke database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO userweb (nama, tanggal_lahir, no_handphone, email, password) 
          VALUES ('$nama', '$tanggal_lahir', '$no_handphone', '$email', '$hashed_password')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan. ID: " . mysqli_insert_id($conn);
} else {
    echo "Error: " . mysqli_error($conn);
}
?>