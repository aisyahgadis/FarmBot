<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjagaan</title>
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
        table-layout: fixed; /* Memastikan setiap kolom punya lebar tetap */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        white-space: nowrap; /* Mencegah teks turun ke bawah */
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
    <h2>Daftar Penjagaan</h2>
    <a href="../tampilan/tadmin.php">Masuk Website</a>
    <table>
        <tr>
            <th>Id penjagaan</th>
            <th>id user</th>
            <th>id jaga</th>
            <th>nama hama</th>
            <th>jenis tips</th>
            <th>Penangkal</th>
            <th>Aksi</th>
        </tr>

        <?php
        $sql = "SELECT * FROM penjagaan";
        $result = $conn->query($sql);
    
        // hasil query sebelumnya
        $row = mysqli_fetch_assoc($result);
        $id_jaga = $row['id_jaga'];
        $id_user = $row['id_user'];

        $query = "SELECT id_jaga, id_user 
          FROM penjagaan 
          WHERE id_jaga = '$id_jaga' AND id_user = '$id_user'";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id_penjagaan']}</td>
                    <td>{$row['id_user']}</td>
                    <td>{$row['id_jaga']}</td>
                    <td>{$row['nama_hama']}</td>
                    <td>{$row['jenis_tips']}</td>
                    <td>{$row['penangkal']}</td>
                    <td>
                        <a href='../login/ejaga.php?id={$row['id_penjagaan']}'>Edit</a> |
                        <a href='../login/deljaga.php?id={$row['id_penjagaan']}' onclick='return confirm(\"Hapus Data ini?\")'>Hapus</a>
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