<?php
$nama = $_GET["nama"];
require_once("./koneksi.php");
	$query = "delete from member where username='$nama'";
	mysqli_query($conn, $query);
	
$num = mysqli_affected_rows($conn);
if ($num > 0) {
    header("location: ./kelola_member_form.php?pesan=hapus", true, 301);
    exit();
} else {
    echo "Penghapusan data gagal dilakukan.";
}

?>   
