<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css?v=<?php echo time(); ?> ">
    <title>Login Page</title>
    <script src="js/modernizr.js"></script>
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

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "kosong") {
            $msg = 'Maaf, User atau password masih kosong!';
        } else if ($_GET['pesan'] == "input") {
            $msg = 'Maaf, User atau password salah!';
        } else if ($_GET['pesan'] == "invalid") {
            $msg = 'Maaf, code captcha invalid!';
        }
    }
    ?>
    <div class="container ">
        <div class="title ">Halaman Login</div>
        <hr>
        <form action="./login_php.php" method="post">
            <div class="user-details ">
                <div class="input-box">
                    <span class="details ">Username</span>
                    <input name="user" type="text" placeholder='Masukkan Username'>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details ">Password</span>
                    <input name="pswd" type="password" placeholder='Masukkan Password'>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details ">Captcha</span>
                    <input name="valcaptcha" type="text" placeholder='Masukkan Captcha'>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box" style="text-align:center;">
                    <span class="details"><img src=" ./captcha.php" alt="foto_captcha"></span>
                </div>
            </div>
            <?php if (!empty($msg)) { ?>
                <div style="color:red; text-align:center"><?= $msg ?></div>
            <?php } ?>
            <div class="button">
                <input name="login" type="submit" value="Login">
            </div>

        </form>
        <form action="./signup_form.php">
            <div class="button">
                <input name="login" type="submit" value="Sign-Up">
            </div>
            <div class="button">
                <a href="./index.php"><input name="" type="button" value="Back"></a>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>