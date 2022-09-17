<?php
if (isset($_POST["btnSubmit"])) {
	$user = $_POST["username"];
	$pass = $_POST["password"];

require_once("./koneksi.php");

$query = "insert into admin (username,password) values  ('$user', $pass)";
echo $query;

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    header("location: ./index.php?pesan=input", true, 301);
    exit();
} else {
    echo "Data gagal disimpan ke dalam database.";
}
}
