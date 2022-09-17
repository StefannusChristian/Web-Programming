<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Member Update Form</title>
</head>

<body>
    <?php 
	$id =$_GET["id"];
    require_once("./koneksi.php");
	
	$query = "select username,password from member where id ='$id'";
	$result = mysqli_query($conn, $query);
	if ($result){
		$row = mysqli_fetch_row($result);
	}
?>
    <div class="container">
        <div class="title ">Form Update Member</div>
        <hr>
        <form action="./update.php" method="post">
            <div class="user-details ">
                <div class="input-box">
                    <span class="details ">Username</span>
                    <input name="name" type="text" placeholder='Masukkan Nama Member' value="<?php echo $row[0];?>">
                </div>
            </div>
            <div class="user-details">

                <div class="input-box">
                    <span class="details ">Password</span>
                    <input name="password" type="text" placeholder='Masukkan Password' value="<?php echo $row[1];?>">
                </div>
            </div>
                <input name="id" type="hidden" value="<?=$id;?>">
            <div class="button">
                <input name="btnSubmit" type="submit" value="Edit">
            </div>
            <div class="button">
                <a href="./kelola_member_form.php">
                    <input type="button" value="Back">
                </a>
            </div>
        </form>
    </div>
</body>

</html>