<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Ambil ID dari parameter URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Hapus data dari database
    $query = "DELETE FROM admin WHERE id=$id";
    $result = $conn->query($query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>