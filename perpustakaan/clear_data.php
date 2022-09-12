<?php
    if (isset($_POST["btnSubmit"])) {        
        $dbname = "data_buku";
        $host = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "delete from detail_buku";
        mysqli_query($conn, $query);
        $num = mysqli_affected_rows($conn);
        if ($num > 0) {
            echo "Database berhasil dikosongkan!";
        }
        else {
            echo "Database gagal dikosongkan!";
        }
    }
?>

<a href="./index.html">
    <input type="button" value="back" class="back_button">
</a>
