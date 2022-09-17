<?php
@include './koneksi.php';
if (isset($_POST['add_product'])) {
    $p_penulis = $_POST['p_penulis'];
    $p_judul = $_POST['p_judul'];
    $p_tanggal = $_POST['p_tanggal'];
    // File Name
    $p_pdf = $_FILES['p_pdf']['name'];
    $p_pdf_tmp_name = $_FILES['p_pdf']['tmp_name'];
    $p_pdf_folder = 'uploaded_pdf/' . $p_pdf;
    $p_fileType = $_FILES['p_pdf']['type'];
    $allowed = array('pdf');
    $fileExt = explode('.', $p_pdf);
    $fileActualext = strtolower(end($fileExt));

    if (in_array($fileActualext, $allowed)) {

        $insert_query = mysqli_query($conn, "INSERT INTO `pdf`(`penulis`, `judul`,`tanggal`,`file`) VALUES('$p_penulis','$p_judul', '$p_tanggal', '$p_pdf')") or die('query failed');

        if ($insert_query) {
            move_uploaded_file($p_pdf_tmp_name, $p_pdf_folder);
            header("Refresh:0");
        } else {
            header("Refresh:0");
        }
    } else {
        echo 'Invalid File Type!';
    }
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `pdf` WHERE id = $delete_id ") or die('query failed');
    if ($delete_query) {
        header('location:./halaman_view_pdf.php');
    } else {
        header('location:./halaman_view_pdf.php');
    };
};

if (isset($_GET['view'])) {
    $view_id = $_GET['view'];
    $result = mysqli_query($conn, "SELECT file FROM `pdf` WHERE id = $view_id ") or die('query failed');
    $row = mysqli_fetch_object($result);
    $hasil = $row->file;
    header("content-type:application/pdf");
    readfile('uploaded_pdf/' . $hasil);
};

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_penulis = $_POST['update_p_penulis'];
    $update_p_judul = $_POST['update_p_judul'];
    $update_p_tanggal = $_POST['update_p_tanggal'];
    $update_p_pdf = $_FILES['update_p_pdf']['name'];
    $update_p_pdf_tmp_name = $_FILES['update_p_pdf']['tmp_name'];
    $update_p_pdf_folder = 'uploaded_pdf/' . $update_p_pdf;

    $update_query = mysqli_query($conn, "UPDATE `pdf` SET penulis = '$update_p_penulis',judul='$update_p_judul', tanggal = '$update_p_tanggal', file = '$update_p_pdf' WHERE id = '$update_p_id'");

    if ($update_query) {
        move_uploaded_file($update_p_pdf_tmp_name, $update_p_pdf_folder);
        header('location:./halaman_view_pdf.php');
    } else {
        header('location:./halaman_view_pdf.php');
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman View PDF</title>

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
    <section class="page-header page-header--contact">

        <div class=" gradient-overlay">
        </div>
        <div class="row page-header__content">
            <div class="column">
                <h1>Halaman View PDF</h1>
            </div>
        </div>

    </section>


    <div class="container">

        <section class="display-product-table">

            <table>

                <thead>
                    <th>Penulis PDF</th>
                    <th>Judul PDF</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                    <?php

                    $select_products = mysqli_query($conn, "SELECT * FROM `pdf`");
                    $numRow = mysqli_num_rows($select_products);
                    if ($numRow  > 0) {
                        for ($i = 0; $i < $numRow; $i++) {
                            $row = mysqli_fetch_assoc($select_products);
                    ?>
                    <?php
                    $timestamp = strtotime($row['tanggal']);
                    $month = date('F', $timestamp);
                    $num = date('m', $timestamp);
                    $year = date('Y', $timestamp);
                    ?>

                    <tr>
                        <td><?php echo $row['penulis']; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $num . ' ' . $month . ' ' . $year ?></td>
                        <td>
                            <a href="./halaman_view_pdf.php?view=<?php echo $row['id']; ?>" target="_blank"
                                class="view-btn"> <i class="fas fa-eye"></i> View </a>
                        </td>
                    </tr>

                    <?php
                        };
                    } else {
                        echo "<div class='empty'>Tidak Ada PDF Yang Ditambahkan</div>";
                    };
                    ?>
                </tbody>
            </table>

        </section>

        <section class="edit-form-container">

            <?php

            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `pdf` WHERE id = $edit_id");
                if (mysqli_num_rows($edit_query) > 0) {
                    while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_p_penulis"
                    value="<?php echo $fetch_edit['penulis']; ?>">
                <input type="text" class="box" required name="update_p_judul"
                    value="<?php echo $fetch_edit['judul']; ?>">
                <input type="date" min="0" class="box" required name="update_p_tanggal"
                    value="<?php echo $fetch_edit['tanggal']; ?>">
                <input type="file" class="box" required name="update_p_pdf" accept="application/pdf">
                <input type="submit" value="Perbarui PDF " name="update_product" class="btn">
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
    <script src="js/upload_pdf.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


</body>

</html>