<?php
include 'koneksi.php';

// Read Data
$query = "SELECT * FROM admin";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Admin Rumah Sakit</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Admin</th>
            <th>No. Handphone</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Umur</th>
            <th>No WhatsApp</th>
            <th>Sosial Media</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_admin'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['ttl'] . "</td>";
            echo "<td>" . $row['umur'] . "</td>";
            echo "<td>" . $row['no_whatsapp'] . "</td>";
            echo "<td><img src='upload/" . $row['sosial_media'] . "' alt='Sosial Media Image' width='200'></td>";
            echo "<td>
                      <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                      <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="create.php" class="button">Tambah Admin Baru</a>

    <br>

<!-- Tambahkan tombol untuk download dan cetak -->
<a href="download.php?id=<?php echo $row['id']; ?>" class="button">Download</a>
<input type="button" value="Cetak" onclick="printData()">

<script>
    function printData() {
        window.print();
    }
</script>

<br>
</body>
</html>
