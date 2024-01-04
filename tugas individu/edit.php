<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $nama_admin = $_POST['nama_admin'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $umur = $_POST['umur'];
    $no_whatsapp = $_POST['no_whatsapp'];
    $sosial_media = $_POST['sosial_media'];

    // Update data di database
    $query = "UPDATE admin SET
        nama_admin='$nama_admin',
        no_hp='$no_hp',
        email='$email',
        jenis_kelamin='$jenis_kelamin',
        alamat='$alamat',
        ttl='$ttl',
        umur='$umur',
        no_whatsapp='$no_whatsapp',
        sosial_media='$sosial_media'
        WHERE id=$id";
    $result = $conn->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Tampilkan data yang akan di-edit
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
    die("Invalid ID: " . $_GET['id']);
    }

    $query = "SELECT * FROM admin WHERE id=$id";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        die("Data not found");
    }

    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Admin</h2>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <!-- Tampilkan data yang akan di-edit dan tambahkan input untuk data lainnya -->

        <label for="nama_admin">Nama Admin:</label>
        <input type="text" name="nama_admin" value="<?php echo $row['nama_admin']; ?>" required>
        <label for="no_hp">No Handphone:</label>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" required>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
        <label for="ttl">Tempat/Tanggal Lahir:</label>
        <input type="text" name="ttl" value="<?php echo $row['ttl']; ?>" required>
        <label for="umur">Umur:</label>
        <input type="text" name="umur" value="<?php echo $row['umur']; ?>" required>
        <label for="no_whatsapp">No WhatsApp:</label>
        <input type="text" name="no_whatsapp" value="<?php echo $row['no_whatsapp']; ?>" required>
        <label for="sosial_media">Sosial Media:</label>
        <input type="file" name="sosial_media" value="<?php echo $row['sosial_media']; ?>" required>
        <br>

        <!-- Tambahkan input untuk data lainnya -->

        <br>
        
        <input type="submit" value="Simpan">
    </form>

    <br>
    <a href="index.php" class="Button">Kembali</a>

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