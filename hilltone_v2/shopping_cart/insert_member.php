<?php
if (isset($_POST["btnSubmit"])) {
	$nama = $_POST["nama_member"];
	$pass = $_POST["pass_member"];

require_once("./koneksi.php");

$query = "insert into member (username,password) values  ('$nama','$pass')";
echo $query;

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    header("location: ./kelola_member_form.php?pesan=input", true, 301);
    exit();
} else {
    echo "Data gagal disimpan ke dalam database.";
}
}
?>   
