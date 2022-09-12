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
        # bool_1 = false (judul A tidak ada di database)
        # bool_2 = false (judul B tidak ada di database)
        $bool_1 = false;
        $bool_2 = false;
        $dup = mysqli_query($conn,"select * from detail_buku where Judul='Judul A'");
        if(mysqli_num_rows($dup)>0){
            echo "Judul Buku A sudah ada di database!".'<br>';
            echo "Judul Buku A tidak berhasil ditambahkan!".'<br>';
            $bool_1 = true;
        }
        $dup_B = mysqli_query($conn,"select * from detail_buku where Judul='Judul B'");
        if(mysqli_num_rows($dup_B)>0){
            echo "Judul Buku B sudah ada di database!".'<br>';
            echo "Judul Buku B tidak berhasil ditambahkan!".'<br>';
            $bool_2 = true;
        }
        # Insert Judul A to database
        if ($bool_1 == false){
            $query = "insert into detail_buku VALUES ('Judul A', 'Pengarang A', 'Penerbit A', '2022-03-23')";
            mysqli_query($conn, $query);
        }
        # Insert Judul B to database
        if ($bool_2 == false){
            $query_2 = "insert into detail_buku VALUES ('Judul B', 'Pengarang B', 'Penerbit B', '2022-03-06')";
            mysqli_query($conn, $query_2);
        }
        $full_check = "SELECT COUNT(*) FROM detail_buku";
        if ($full_check > 0){
            $num = mysqli_affected_rows($conn);
            if ($num > 0) {
                echo "Dummy Data Berhasil Ditambahkan".'<br>';
            }
            else {
                echo "Data Dummy Gagal Dibuat!.";
            }
        }

    }
?>

<a href="./index.html">
    <input type="button" value="back" class="back_button">
</a>
