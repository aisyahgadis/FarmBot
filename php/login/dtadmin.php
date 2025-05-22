<?php
include '../database/config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jaga WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../database/jadmin.php");
        exit();
    } else {
        echo "Error:" . $conn->error;
    }
}
?>