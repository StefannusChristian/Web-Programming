<?php
$dbname = "calvin_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
}
$conn = mysqli_connect($host, $username, $password, $dbname);
$query = "SELECT `2017`, `2018`, `2019`, `2020`, `2021` FROM `data_jemaat_tahunan` WHERE cabang ='Makassar';";
$chkresults = mysqli_query($conn, $query);
$row = mysqli_fetch_row($chkresults);
$data = array($row[0], $row[1], $row[2], $row[3], $row[4]);
header("Content-Type: application/json");
echo (json_encode($data));
