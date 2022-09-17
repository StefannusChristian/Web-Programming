<?php
@include './koneksi.php';
if (isset($_POST['add_product'])) {
   $p_name = $_POST['p_name'];
   $p_tanggal = $_POST['p_tanggal'];
   $p_keterangan = $_POST['p_keterangan'];
   // File Name
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/' . $p_image;
   $p_fileType = $_FILES['p_image']['type'];
   $allowed = array('jpg', 'jpeg', 'png', 'gif');
   $fileExt = explode('.', $p_image);
   $fileActualext = strtolower(end($fileExt));

   if (in_array($fileActualext, $allowed)) {

      $insert_query = mysqli_query($conn, "INSERT INTO `galeri`(`name`, `keterangan`,`tanggal`,`image`) VALUES('$p_name','$p_keterangan', '$p_tanggal', '$p_image')") or die('query failed');

      if ($insert_query) {
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
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
   $delete_query = mysqli_query($conn, "DELETE FROM `galeri` WHERE id = $delete_id ") or die('query failed');
   if ($delete_query) {
      header('location:./add_picture_admin.php');
   } else {
      header('location:./add_picture_admin.php');
   };
};

if (isset($_POST['update_product'])) {
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_keterangan = $_POST['update_p_keterangan'];
   $update_p_tanggal = $_POST['update_p_tanggal'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/' . $update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `galeri` SET name = '$update_p_name',keterangan='$update_p_keterangan', tanggal = '$update_p_tanggal', image = '$update_p_image' WHERE id = '$update_p_id'");

   if ($update_query) {
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      header('location:./add_picture_admin.php');
   } else {
      header('location:./add_picture_admin.php');
   }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin Gallery Page</title>

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
                <img src="./images/church.png" alt="Homepage">
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
    <section class="page-header page-header--connect">

        <div class=" gradient-overlay">
        </div>
        <div class="row page-header__content">
            <div class="column">
                <h1>Halaman CRUD Galeri Kegiatan</h1>
            </div>
        </div>

    </section>


    <div class="container">

        <section style="margin-top: 5px;">

            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Tambahkan Gambar</h3>
                <input type="text" name="p_name" placeholder="masukkan nama gambar" class="box" required>
                <input type="text" name="p_keterangan" min="0" placeholder="masukkan keterangan gambar" class="box"
                    required>
                <input type="text" name="p_tanggal" min="0" onfocus="(this.type='date')" placeholder="masukkan tanggal"
                    class="box" required>
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" value="Tambahkan Gambar" name="add_product" class="btn">
            </form>

        </section>

        <section class="display-product-table">

            <table>

                <thead>
                    <th>Gambar Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                    <?php

               $select_products = mysqli_query($conn, "SELECT * FROM `galeri`");
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
                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $num . ' ' . $month . ' ' . $year ?></td>
                        <td>
                            <a href="./add_picture_admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                                onclick="return confirm(' Yakin ingin dihapus?');"> <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="./add_picture_admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i
                                    class="fas fa-edit"></i> Perbarui </a>
                        </td>
                    </tr>

                    <?php
                  };
               } else {
                  echo "<div class='empty'>Tidak Ada Gambar Yang Ditambahkan</div>";
               };
               ?>
                </tbody>
            </table>

        </section>

        <section class="edit-form-container">

            <?php

         if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `galeri` WHERE id = $edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
               while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
         ?>

            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                <input type="text" class="box" required name="update_p_keterangan"
                    value="<?php echo $fetch_edit['keterangan']; ?>">
                <input type="date" min="0" class="box" required name="update_p_tanggal"
                    value="<?php echo $fetch_edit['tanggal']; ?>">
                <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="Perbarui Gambar " name="update_product" class="btn">
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
    <script src="js/script.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


</body>

</html>