<?php
@include './koneksi.php';
if (isset($_POST['add_product'])) {
    $p_tanggal = $_POST['p_tanggal'];
    $p_judul = $_POST['p_judul'];
    $p_isi = $_POST['p_isi'];

    $insert_query = mysqli_query($conn, "INSERT INTO `artikel`(`tanggal`, `judul`,`isi`) VALUES('$p_tanggal','$p_judul', '$p_isi')") or die('query failed');

    if ($insert_query) {
        header("Refresh:0");
    } else {
        header("Refresh:0");
    }
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `artikel` WHERE id = $delete_id ") or die('query failed');
    if ($delete_query) {
        header('location:./write_article.php');
    } else {
        header('location:./write_article.php');
    };
};

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_tanggal = $_POST['update_p_tanggal'];
    $update_p_judul = $_POST['update_p_judul'];
    $update_p_isi = $_POST['update_p_isi'];

    $update_query = mysqli_query($conn, "UPDATE `artikel` SET tanggal = '$update_p_tanggal',judul='$update_p_judul', isi = '$update_p_isi' WHERE id = '$update_p_id'");

    if ($update_query) {
        header('location:./write_article.php');
    } else {
        header('location:./write_article.php');
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tulisan Admin</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="js/modernizr.js"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/gallery_admin.css?v=<?php echo time(); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">


</head>

<body id="top">
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header ================================================== -->
    <header class=" s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="images/header_pic.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav-wrap">
            <ul class="header-nav">
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="./artikel.php" title="Contact us">Artikel</a></li>
                <li><a href="./data_jemaat.html">Data Jemaat</a></li>
                <li><a href="././galeri_foto.php">Galeri Foto</a></li>
                <li><a href="./gereja_cabang.html">Gereja Cabang</a></li>
                <li><a href="./halaman_view_pdf.php">Halaman PDF</a></li>
                <li><a href="./login_page.php">Login</a></li>
            </ul>
        </nav>
        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header>
    <!-- end s-header -->
    <section class="page-header page-header--volunteer">

        <div class=" gradient-overlay">
        </div>
        <div class="row page-header__content">
            <div class="column">
                <h1>Halaman Tulisan Admin</h1>
            </div>
        </div>

    </section>

    <div class="container">

        <section style="margin-top: 5px;">

            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Tulis Tulisan</h3>
                <input type="text" name="p_judul" placeholder="masukkan judul tulisan" class="box" required>
                <textarea type="text" name="p_isi" cols="30" rows="10" placeholder="masukkan isi tulisan" class="box"
                    required></textarea>
                <input type="text" name="p_tanggal" min="0" onfocus="(this.type='date')" placeholder="masukkan tanggal"
                    class="box" required>
                <input type="submit" value="Tambahkan Tulisan" name="add_product" class="btn">
            </form>

        </section>

        <section class="display-product-table">

            <table>

                <thead>
                    <th>Tanggal Artikel</th>
                    <th>Judul Artikel</th>
                    <th>Isi Artikel</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                    <?php

                    $select_products = mysqli_query($conn, "SELECT * FROM `artikel`");
                    $numRow = mysqli_num_rows($select_products);
                    if ($numRow  > 0) {
                        for ($i = 0; $i < $numRow; $i++) {
                            $row = mysqli_fetch_assoc($select_products);
                    ?>

                    <tr>
                        <?php
                                $timestamp = strtotime($row['tanggal']);
                                $month = date('F', $timestamp);
                                $num = date('m', $timestamp);
                                $year = date('Y', $timestamp);
                                $strArray = explode('.', $row['isi']);
                                ?>
                        <td><?php echo $num . ' ' . $month . ' ' . $year ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $strArray[0] . "..."; ?></td>
                        <td>
                            <a href="./write_article.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                                onclick="return confirm(' Yakin ingin dihapus?');"> <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="./write_article.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i
                                    class="fas fa-edit"></i> Perbarui </a>
                        </td>
                    </tr>

                    <?php
                        };
                    } else {
                        echo "<div class='empty'>Tidak Ada Tulisan Yang Ditambahkan</div>";
                    };
                    ?>
                </tbody>
            </table>

        </section>

        <section class="edit-form-container">

            <?php

            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `artikel` WHERE id = $edit_id");
                if (mysqli_num_rows($edit_query) > 0) {
                    while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_p_judul"
                    value="<?php echo $fetch_edit['judul']; ?>">
                <input type="text" class="box" required name="update_p_isi" value="<?php echo $fetch_edit['isi']; ?>">
                <input type="date" min="0" class="box" required name="update_p_tanggal"
                    value="<?php echo $fetch_edit['tanggal']; ?>">
                <input type="submit" value="Perbarui Artikel " name="update_product" class="btn">
                <input type="reset" value="Kembali" id="close-edit" class="option-btn">
            </form>

            <?php
                    };
                };
                echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
            };
            ?>

        </section>

    </div>















    <!-- custom js file link  -->
    <script src="js/tulisan.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


</body>

</html>