<?php
    if (isset($_POST["btnSubmit"])) {
        $Judul= $_POST["Judul"];
        $Judul_Baru= $_POST["Judul_Baru"];
        $Pengarang_Baru = $_POST["Pengarang_Baru"];
        $Penerbit_Baru = $_POST["Penerbit_Baru"];
        $Tahun_Terbit_Baru = $_POST["Tahun_Terbit_Baru"];

        $dbname = "data_buku";
        $host = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }
        $query = "update detail_buku set Judul='$Judul_Baru',Pengarang='$Pengarang_Baru',Penerbit='$Penerbit_Baru',Tahun_Terbit='$Tahun_Terbit_Baru' WHERE Judul='$Judul'";
        mysqli_query($conn, $query);
        $num = mysqli_affected_rows($conn);
        if ($num > 0) {
            echo "Data Berhasil Ke Update!";
        }
        else {
            echo "Data Gagal Di Update";
        }
    }
?>

<a href="./index.html">
    <input type="button" value="back" class="back_button">
</a>
