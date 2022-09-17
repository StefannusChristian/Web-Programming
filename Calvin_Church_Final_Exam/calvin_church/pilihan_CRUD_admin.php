<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Halaman Pilihan Login</title>
    <script src="js/modernizr.js"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/gallery_admin.css?v=<?php echo time(); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body>
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="container ">
        <div class="title ">Halaman Pilihan Login </div>
        <hr>
        <form>
            <div class="button">
                <a href="add_picture_admin.php"><input name="" type="button" value="CRUD Galeri"></a>
            </div>
            <div class="button">
                <a href="write_article.php"><input name="" type="button" value="CRUD Artikel"></a>
            </div>
            <div class="button">
                <a href="halaman_upload_pdf.php"><input name="" type="button" value="CRUD PDF"></a>
            </div>
            <div class="button">
                <a href="crud_admin_mingguan.php"><input name="" type="button" value="CRUD Data Jemaat"></a>
            </div>
        </form>
    </div>
    <script src="js/tulisan.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>