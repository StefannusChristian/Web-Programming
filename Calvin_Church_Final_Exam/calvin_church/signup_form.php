<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css?v=<?php echo time(); ?> ">
    <title>Sign Up Form</title>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <script src="js/modernizr.js"></script>
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
        <div class="title ">Form Sign Up</div>
        <hr>
        <form action="./sign_up.php" method="post">
            <div class="user-details ">
                <div class="input-box">
                    <span class="details ">Username</span>
                    <input name="username" type="text" placeholder='Masukkan Username'>
                </div>
                <div class="input-box">
                    <span class="details ">Password</span>
                    <input name="password" type="password" placeholder='Masukkan Password'>
                </div>
            </div>
            <div class="button">
                <input name="btnSubmit" type="submit" value="Sign-Up">
            </div>
            <div class="button">
                <a href="./login_page.php">
                    <input type="button" value="Back">
                </a>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>