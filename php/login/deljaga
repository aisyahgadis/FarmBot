<?php
include '../database/config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM penjagaan WHERE id_penjagaan=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../database/jaga.php");
        exit();
    } else {
        echo "Error:" . $conn->error;
    }
}
?>