<!DOCTYPE html>
<html class="no-js" lang="en">
<?php

@include './koneksi.php';
?>

<head>

    <meta charset="utf-8">
    <title>Halaman Galeri</title>
    <meta name="description" content="">
    <meta name="author" content="">


    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">


    <script src="js/modernizr.js"></script>


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



    <header class="s-header">

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



    <section class="page-header page-header--about">

        <div class=" gradient-overlay">
        </div>
        <div class="row page-header__content">
            <div class="column">
                <h1>Galeri Kegiatan</h1>
            </div>
        </div>

    </section>


    <section class="page-content">
        <div class="row wide block-large-1-2 block-900-full events-list">
            <?php
            $select_foto = mysqli_query($conn, "SELECT * FROM `galeri`");
            if (mysqli_num_rows($select_foto) > 0) {
                while ($fetch_foto = mysqli_fetch_assoc($select_foto)) {
            ?>
                    <div class="column events-list__item">
                        <h3 class="display-1 events-list__item-title">
                            <a title=""><?php echo $fetch_foto['name']; ?></a>
                        </h3>
                        <p>
                            <img src="uploaded_img/<?php echo $fetch_foto['image']; ?>" alt="">
                        </p>
                        <ul class="events-list__meta">
                            <?php
                            $timestamp = strtotime($fetch_foto['tanggal']);
                            $month = date('F', $timestamp);
                            $num = date('m', $timestamp);
                            $year = date('Y', $timestamp);
                            ?>
                            <li class="events-list__meta-date"><?php echo $num . ' ' . $month . ' ' . $year ?></li>
                        </ul>
                        <p class="lead drop-cap">
                            <?php echo $fetch_foto['keterangan'] ?>
                        </p>
                    </div>
            <?php
                };
            };
            ?>
        </div>

    </section>


    <section class="s-social">

        <div class="row social-content">
            <div class="column">
                <ul class="social-list">
                    <li class="social-list__item">
                        <a href="https://www.facebook.com/reformed.injili.events/" target="_blank" title="">
                            <span class="social-list__icon social-list__icon--facebook"></span>
                            <span class="social-list__text">Facebook</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="https://twitter.com/reformedinjili" target="_blank" title="">
                            <span class="social-list__icon social-list__icon--twitter"></span>
                            <span class="social-list__text">Twitter</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="https://www.instagram.com/reformed.injili/" target="_blank" title="">
                            <span class="social-list__icon social-list__icon--instagram"></span>
                            <span class="social-list__text">Instagram</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="#0" title="">
                            <span class="social-list__icon social-list__icon--email"></span>
                            <span class="social-list__text">calvinchurch@gmail.com</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end social-content -->

    </section>
    <!-- end s-social -->


    <!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="row footer-top">
            <div class="column large-4 medium-5 tab-full">
                <div class="footer-logo">
                    <a class="site-footer-logo" href="index.php">
                        <img src="images/header_pic.png" alt="Homepage">
                    </a>
                </div>
                <!-- footer-logo -->
                <p>
                    Kami percaya Yesus adalah Anak Allah yang, dalam kasih-Nya yang besar, datang ke dunia untuk menghapus dosa-dosa kita dengan mati di kayu salib, dan bangkit kembali pada hari ketiga untuk pembenaran kita. Karena kita telah dibenarkan dan dibenarkan, kita
                    memiliki hidup yang kekal dan hubungan dengan Bapa Surgawi kita, dan kita dapat menjalani hidup kita dengan tuntunan Roh Kudus, membantu kita untuk memenuhi tujuan hidup kita dan untuk membawa kemuliaan bagi-Nya.
                </p>
            </div>
            <div class="column large-half tab-full">
                <div class="row">
                    <div class="column large-7 medium-full">
                        <h4 class="h6">Lokasi Kami</h4>
                        <p>
                            Calvin Tower RMCI Jl. Industri Blok B14, RW.10, <br> East Pademangan, Kemayoran, Central Jakarta City, <br> Jakarta 10610
                        </p>

                        <p>
                            <a href="https://www.google.com/maps/place/Calvin+Institute+of+Technology/@-6.152699,106.8429962,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f5db59766413:0xdaa8627877dbb6b0!8m2!3d-6.152699!4d106.8429962" target="_blank" class="btn btn--footer">Get Direction</a>
                        </p>
                    </div>
                    <div class="column large-5 medium-full">
                        <h4 class="h6">Tautan Langsung</h4>
                        <ul class="footer-list">
                            <li class="current"><a href="index.php" title="Home">Home</a></li>
                            <li><a href="./artikel.php" title="About">Artikel</a></li>
                            <li><a href="./data_jemaat.html" title="Services">Data Jemaat</a></li>
                            <li><a href="./galeri_foto.php" title="Contact us">Galeri Foto</a></li>
                            <li><a href="./halaman_view_pdf.php" title="Contact us">Halaman PDF</a></li>
                            <li><a href="./login_page.php" title="Contact us">Login</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer-top -->

        <div class="row footer-bottom">
            <div class="column ss-copyright">
                <span>© Copyright Calvin Church 2022</span>
                <span>Design by <a href="https://www.instagram.com/stefannuschristian/" target="_blank">Stefannus Christian</a></span>
                <span>Design by <a href="https://www.instagram.com/steve_theodorus/" target="_blank">Stephen Theodorus</a></span>
            </div>
        </div>
        <!-- footer-bottom -->

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 0l8 9h-6v15h-4v-15h-6z" />
                </svg>
            </a>
        </div>
        <!-- ss-go-top -->

    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>