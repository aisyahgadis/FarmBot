<?php
session_start();         // Mulai session
session_destroy();       // Hapus semua session

// Redirect ke halaman utama
header("Location: ../tampilan/formhome.php");
exit;
?>