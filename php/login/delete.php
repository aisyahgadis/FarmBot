<?php
include '../database/config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM userweb WHERE id_user=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../database/index.php");
        exit();
    } else {
        echo "Error:" . $conn->error;
    }
}
?>