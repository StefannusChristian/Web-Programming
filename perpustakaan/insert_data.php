<?php
    if (isset($_POST["btnSubmit"])) {
        $Judul= $_POST["Judul"];
        $Pengarang = $_POST["Pengarang"];
        $Penerbit = $_POST["Penerbit"];
        $Tahun_Terbit = $_POST["Tahun_Terbit"];

        $dbname = "data_buku";
        $host = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }
        $dup = mysqli_query($conn,"select * from detail_buku where Judul='$Judul'");
        if(mysqli_num_rows($dup)>0){
            echo "Judul Buku Gagal Ditambahkan!".'<br>';
            echo "Judul Buku $Judul sudah ada di database!";
        }
        else{
            $query = "insert into detail_buku values ('$Judul', '$Pengarang', '$Penerbit','$Tahun_Terbit')";
            mysqli_query($conn, $query);
            $num = mysqli_affected_rows($conn);
            if ($num > 0) {
                echo "Data yang kamu simpan sudah disimpan!".'<br>';
                echo "Detail data yang disimpan: ".'<br>';
                echo "Judul Buku: {$Judul}".'<br>';
                echo "Pengarang: {$Pengarang}".'<br>';
                echo "Penerbit: {$Penerbit}".'<br>';
                echo "Tahun Terbit: {$Tahun_Terbit}".'<br>';
            }
            else {
                echo "Terjadi Kesalahan. Data gagal disimpan ke dalam database.";
            }
        }
    }
?>

<a href="./index.html">
    <input type="button" value="back" class="back_button">
</a>
