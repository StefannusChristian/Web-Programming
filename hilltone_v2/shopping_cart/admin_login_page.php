<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Admin Login Page</title>
</head>

<body>
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "kosong"){
            $msg = 'Maaf, User atau password masih kosong!';
		}else if($_GET['pesan'] == "input") {
            $msg = 'Maaf, User atau password salah!';
		}else if($_GET['pesan'] == "invalid") {
            $msg = 'Maaf, code captcha invalid!';
		}
	}
	?>
    <div class="container ">
        <div class="title ">Admin Login Page</div>    
        <hr>
        <form action="admin_login.php" method="post">
            <div class="user-details ">
                <div class="input-box">
                    <span class="details ">Admin Username</span>
                    <input name="user" type="text" placeholder='Masukkan Username'>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details ">Admin Password</span>
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
                <div class="input-box ">
                    <span class="details "><img src="captcha.php" alt="foto_captcha"></span>
                </div>
            </div>
            <?php if (!empty($msg)) {?>
            <div style="color:red; text-align:center"><?= $msg ?></div>
            <?php } ?>
            <div class="button">
                <input name="login" type="submit" value="Login">
            </div>
            
        </form>
    </div>
</body>

</html>