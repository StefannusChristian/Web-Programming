<?php
if (isset($_POST["btnSubmit"])) {
    $id = $_POST["id"];
	$name = $_POST["name"];
	$pass = $_POST["password"];
    echo $id."<br>";
    echo $name."<br>";
    echo $pass."<br>";
    
require_once("./koneksi.php");

$query = "update member set username='$name', password=$pass where id ='$id'";
echo $query;

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    echo "Data yang kamu simpan sudah disimpan."; 
?>
    <meta content="0; url=./kelola_member_form.php?pesan=update" http-equiv="refresh">
<?php
} else {
    echo "Data gagal disimpan ke dalam database.";
}
}
?>   
