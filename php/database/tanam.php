<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produktivitas</title>
<style>
        body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
        margin: 20px;
    }

    .container {
        width: 100%;
        max-width: 1100px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        table-layout: fixed; 
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    th {
        background-color:rgb(1, 20, 40);
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    a {
        text-decoration: none;
        color:rgb(1, 12, 24);
        font-weight: bold;
        font-family: "Times New Roman", Times, serif;
    }

    a:hover {
        color: red;
    }
    </style>
</head>
<body>
    <div class="container">
    <h2>Daftar Produktivitas</h2>
    <table>
    <tr>
        <th>Id Produktivitas</th>
        <th>Id User</th>
        <th>Luas ubin</th>
        <th>Hasil panen</th>
        <th>Produktivitas Kg/Ha</th>
        <th>Produktivitas Ton/Ha</th>
        <th>Aksi</th>
    </tr>

    <?php
    // Query Data dari Tabel `penanaman`
    $sql = "SELECT * FROM produktivitas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id_produktivitas']}</td>
                <td>{$row['id_user']}</td>
                <td>{$row['luas_ubin']}</td>
                <td>{$row['hasil_panen']}</td>
                <td>{$row['produktivitas_kg_ha']}</td>
                <td>{$row['produktivitas_ton_ha']}</td>
                <td>
                    <a href='../login/eproduktivitas.php?id={$row['id_produktivitas']}'>Edit</a> |
                    <a href='../login/deltanam.php?id={$row['id_produktivitas']}' onclick='return confirm(\"Hapus Data ini?\")'>Hapus</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
    }
    $conn->close();
    ?>
    </table>
    </div>
</body>
</html>