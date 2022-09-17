<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css ">
    <title>Insert Member Form</title>
</head>

<body>
    <div class="container ">
        <div class="title ">Form Tambah Member</div>
        <hr>
        <form action="./insert_member.php" method="post">
            <div class="user-details ">
                <div class="input-box">
                    <span class="details ">Nama Member</span>
                    <input name="nama_member" type="text" placeholder='Masukkan Nama Member'>
                </div>
                <div class="input-box">
                    <span class="details ">Password Member</span>
                    <input name="pass_member" type="text" placeholder='Masukkan Password Member'>
                </div>
            </div>
            <div class="button">
                <input name="btnSubmit" type="submit" value="Tambah">
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