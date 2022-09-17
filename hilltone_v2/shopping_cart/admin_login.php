<?php 
	$user = $_POST['user'];
	$pswd = $_POST['pswd'];

	session_start();

	echo $user;
	echo $pswd;

	if($user == ""){
		header("location: admin_login_page.php?pesan=kosong", true, 301);
	exit();
	}

	require_once("./koneksi.php");
	$query = "select * from admin where username='$user' and password='$pswd'";
	mysqli_query($conn, $query);

	$num = mysqli_affected_rows($conn);

	if ($num > 0) {
		if ($_SESSION["captcha"] == $_POST["valcaptcha"]) {
			header("location: admin.php?", true, 301);
			exit();
	}else{
		header("location: admin_login_page.php?pesan=invalid", true, 301);
		exit();
	}
	}else{
		header("location: admin_login_page.php?pesan=input", true, 301);
		exit();   
	}
?>