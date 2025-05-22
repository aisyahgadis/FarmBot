<?php
include '../database/config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produktivitas WHERE id_produktivitas=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../database/tanam.php");
        exit();
    } else {
        echo "Error:" . $conn->error;
    }
}
?>