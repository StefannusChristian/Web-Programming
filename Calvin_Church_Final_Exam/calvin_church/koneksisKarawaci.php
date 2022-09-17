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
$query = "SELECT `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52` FROM `data_jemaat_mingguan` WHERE cabang ='Karawaci';";
$chkresults = mysqli_query($conn, $query);
$row = mysqli_fetch_row($chkresults);
$data = array(
    $row[0],
    $row[1],
    $row[2],
    $row[3],
    $row[4],
    $row[5],
    $row[6],
    $row[7],
    $row[8],
    $row[9],
    $row[10],
    $row[11],
    $row[12],
    $row[13],
    $row[14],
    $row[15],
    $row[16],
    $row[17],
    $row[18],
    $row[19],
    $row[20],
    $row[21],
    $row[22],
    $row[23],
    $row[24],
    $row[25],
    $row[26],
    $row[27],
    $row[28],
    $row[29],
    $row[30],
    $row[31],
    $row[32],
    $row[33],
    $row[34],
    $row[35],
    $row[36],
    $row[37],
    $row[38],
    $row[39],
    $row[40],
    $row[41],
    $row[42],
    $row[43],
    $row[44],
    $row[45],
    $row[46],
    $row[47],
    $row[48],
    $row[49],
    $row[50],
    $row[51]
);
header("Content-Type: application/json");
echo (json_encode($data));
