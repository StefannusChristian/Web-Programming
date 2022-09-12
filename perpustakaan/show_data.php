<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="./show_data.css">
        <title>Show Table</title>
    </head>
    <body>
        <h3>Data Buku</h3>
        <?php
        $dbname = "data_buku";
        $host = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "SELECT * FROM detail_buku";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>

        <h4><u>Detail Buku</u></h4>
        <table border="1">
            <tr>
                <th>JUDUL</th>
                <th>PENGARANG</th>
                <th>PENERBIT</th>
                <th>TAHUN TERBIT</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_row($result)) {
        ?>
            <tr><?php
                    $Judul = $row[0];
                    $Pengarang = $row[1];
                    $Penerbit = $row[2];
                    $Tahun_Terbit = $row[3];
                ?>
                    <td><?php echo $Judul;?></td>
                    <td><?php echo $Pengarang;?></td>
                    <td><?php echo $Penerbit;?></td>
                    <td><?php echo $Tahun_Terbit;?></td>
            </tr>
        <?php } ?>
        </table>
        <?php
        mysqli_free_result($result);
        }
    mysqli_close($conn);
    ?>
    <a href="./index.html">
        <input type="button" value="back" class="back_button">
    </a>
    </body>
</html>