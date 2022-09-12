<?php
    if (isset($_POST["btnSubmit"])) {
        $Judul= $_POST["Judul"];

        $dbname = "data_buku";
        $host = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "delete from detail_buku WHERE Judul='$Judul'";
        mysqli_query($conn, $query);
        $num = mysqli_affected_rows($conn);
        if ($num > 0) {
            echo "Judul Buku $Judul Berhasil buang!";
        }
        else {
            echo "Judul Buku $Judul Gagal buang!";
        }
    }
?>

<a href="./index.html">
    <input type="button" value="back" class="back_button">
</a>
