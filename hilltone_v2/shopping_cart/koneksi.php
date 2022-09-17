<?php
$dbname = "hilltone";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
}
?>