<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
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
    $query = "INSERT INTO admin (nama_admin, no_hp, email, jenis_kelamin, alamat, ttl, umur, no_whatsapp, sosial_media) 
                VALUES ('$nama_admin', '$no_hp', '$email', '$jenis_kelamin', '$alamat', '$ttl', '$umur', '$no_whatsapp', '$sosial_media')";
    $result = $conn->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Tampilkan formulir untuk input data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create Admin</h2>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nama_admin">Nama Admin:</label>
        <input type="text" name="nama_admin" required>
        
        <label for="no_hp">No Handphone:</label>
        <input type="text" name="no_hp" required>
        
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" required>
        
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>
        
        <label for="ttl">Tempat/Tanggal Lahir:</label>
        <input type="text" name="ttl" required>
        
        <label for="umur">Umur:</label>
        <input type="text" name="umur" required>
        
        <label for="no_whatsapp">No WhatsApp:</label>
        <input type="text" name="no_whatsapp" required>
        
        <label for="sosial_media">Sosial Media:</label>
        <input type="file" name="sosial_media" accept="upload/">
        
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

<?php
}
?>