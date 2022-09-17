<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css ">
    <title>Sign Up Form</title>
</head>

<body>
    <div class="container ">
        <div class="title ">Form Sign Up</div>
        <hr>
        <form action="./signup.php" method="post">
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
                <a href="./member_login_page.php">
                    <input type="button" value="Back">
                </a>
            </div>
        </form>
    </div>
</body>

</html>