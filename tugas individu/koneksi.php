<?php
$servername = "localhost";
$username = "staff";
$password = "12345";
$dbname = "rumah sakit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>