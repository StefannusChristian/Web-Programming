<?php
require_once('./koneksi.php');
if (isset($_POST['update'])) {
    $cabang = $_POST['cabang_update'];
    $minggu = $_POST['cabang_minggu'];
    $value = $_POST['cabang_value'];
    $update_query = mysqli_query($conn, "UPDATE `data_jemaat_mingguan` SET `$minggu` = $value WHERE cabang = '$cabang' ") or die('query failed');
    if ($update_query) {
        header('location:./crud_admin_mingguan.php');
    } else {
        header('location:./crud_admin_mingguan.php');
    };

};
if (isset($_POST['delete'])) {
    $cabang = $_POST['cabang_delete'];
    $minggu = $_POST['cabang_minggu_delete'];
    $update_query = mysqli_query($conn, "UPDATE `data_jemaat_mingguan` SET `$minggu` = 0 WHERE cabang = '$cabang' ") or die('query failed');
    if ($update_query) {
        header('location:./crud_admin_mingguan.php');
    } else {
        header('location:./crud_admin_mingguan.php');
    };

};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Member</title>
    <link type="text/css" rel="stylesheet" href="css/table.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/new_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/gallery_admin.css?v=<?php echo time(); ?>">
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
                <img src="images/logo.svg" alt="Homepage">
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
    <section class="page-header page-header--volunteer">

        <div class=" gradient-overlay">
        </div>
        <div class="row page-header__content">
            <div class="column">
                <h1>Halaman CRUD Data Jemaat</h1>
            </div>
        </div>

    </section>
    <section style="margin-top: 5px;">

        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Update</h3>
            <input type="text" name="cabang_update" placeholder="masukkan cabang" class="box" required>
            <input type="text" name="cabang_minggu" placeholder="masukkan minggu" class="box" required>
            <input type="text" name="cabang_value" placeholder="masukkan value" class="box" required>
            <input type="submit" value="Update" name="update" class="btn">
        </form>

    </section>
    <section style="margin-top: 5px;">

        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Delete</h3>
            <input type="text" name="cabang_delete" placeholder="masukkan cabang" class="box" required>
            <input type="text" name="cabang_minggu_delete" placeholder="masukkan minggu" class="box" required>
            <input type="submit" value="Delete" name="delete" class="btn">
        </form>

    </section>

    <?php
    $query = "select * from data_jemaat_mingguan ";
    $result = mysqli_query($conn, $query);


    if ($result){
    ?>


    <form action="./delete.php" method="post">

        <table border="1">
            <tr>
                <th>Cabang</th>
                <th>W-1</th>
                <th>W-2</th>
                <th>W-3</th>
                <th>W-4</th>
                <th>W-5</th>
                <th>W-6</th>
                <th>W-7</th>
                <th>W-8</th>
                <th>W-9</th>
                <th>W-10</th>
                <th>W-11</th>
                <th>W-12</th>
                <th>W-13</th>
                <th>W-14</th>
                <th>W-15</th>
                <th>W-16</th>
                <th>W-17</th>
                <th>W-18</th>
                <th>W-19</th>
                <th>W-20</th>
                <th>W-21</th>
                <th>W-22</th>
                <th>W-23</th>
                <th>W-24</th>
                <th>W-25</th>
                <th>W-26</th>
                <th>W-27</th>
                <th>W-28</th>
                <th>W-29</th>
                <th>W-30</th>
                <th>W-31</th>
                <th>W-32</th>
                <th>W-33</th>
                <th>W-34</th>
                <th>W-35</th>
                <th>W-36</th>
                <th>W-37</th>
                <th>W-38</th>
                <th>W-39</th>
                <th>W-40</th>
                <th>W-41</th>
                <th>W-42</th>
                <th>W-43</th>
                <th>W-44</th>
                <th>W-45</th>
                <th>W-46</th>
                <th>W-47</th>
                <th>W-48</th>
                <th>W-49</th>
                <th>W-50</th>
                <th>W-51</th>
                <th>W-52</th>
            </tr>
            <?php
			while ($row = mysqli_fetch_row($result)) {
			?>
            <tr><?php
			
                $cabang = $row[0];
                $w1 = $row[1];
                $w2 = $row[2];
                $w3 = $row[3];
                $w4 = $row[4];
                $w5 = $row[5];
                $w6 = $row[6];
                $w7 = $row[7];
                $w8 = $row[8];
                $w9 = $row[9];
                $w10 = $row[10];
                $w11 = $row[11];
                $w12 = $row[12];
                $w13 = $row[13];
                $w14 = $row[14];
                $w15 = $row[15];
                $w16 = $row[16];
                $w17 = $row[17];
                $w18 = $row[18];
                $w19 = $row[19];
                $w20 = $row[20];
                $w21 = $row[21];
                $w22 = $row[22];
                $w23 = $row[23];
                $w24 = $row[24];
                $w25 = $row[25];
                $w26 = $row[26];
                $w27 = $row[27];
				$w28 = $row[28];
				$w29 = $row[29];
				$w30 = $row[30];
				$w31 = $row[31];
				$w32 = $row[32];
				$w33 = $row[33];
				$w34 = $row[34];
				$w35 = $row[35];
				$w36 = $row[36];
				$w37 = $row[37];
				$w38 = $row[38];
				$w39 = $row[39];
				$w40 = $row[40];
				$w41 = $row[41];
				$w42 = $row[42];
				$w43 = $row[43];
				$w44 = $row[44];
				$w45 = $row[45];
				$w46 = $row[46];
				$w47 = $row[47];
				$w48 = $row[48];
				$w49 = $row[49];
				$w50 = $row[50];
				$w51 = $row[51];
				$w52 = $row[52];
			?>
                <td><?php echo $cabang;?></td>
                <td><?php echo $w1;?></td>
                <td><?php echo $w2;?></td>
                <td><?php echo $w3;?></td>
                <td><?php echo $w4;?></td>
                <td><?php echo $w5;?></td>
                <td><?php echo $w6;?></td>
                <td><?php echo $w7;?></td>
                <td><?php echo $w8;?></td>
                <td><?php echo $w9;?></td>
                <td><?php echo $w10;?></td>
                <td><?php echo $w11;?></td>
                <td><?php echo $w12;?></td>
                <td><?php echo $w13;?></td>
                <td><?php echo $w14;?></td>
                <td><?php echo $w15;?></td>
                <td><?php echo $w16;?></td>
                <td><?php echo $w17;?></td>
                <td><?php echo $w18;?></td>
                <td><?php echo $w19;?></td>
                <td><?php echo $w20;?></td>
                <td><?php echo $w21;?></td>
                <td><?php echo $w22;?></td>
                <td><?php echo $w23;?></td>
                <td><?php echo $w24;?></td>
                <td><?php echo $w25;?></td>
                <td><?php echo $w26;?></td>
                <td><?php echo $w27;?></td>
                <td><?php echo $w28;?></td>
                <td><?php echo $w29;?></td>
                <td><?php echo $w30;?></td>
                <td><?php echo $w31;?></td>
                <td><?php echo $w32;?></td>
                <td><?php echo $w33;?></td>
                <td><?php echo $w34;?></td>
                <td><?php echo $w35;?></td>
                <td><?php echo $w36;?></td>
                <td><?php echo $w37;?></td>
                <td><?php echo $w38;?></td>
                <td><?php echo $w39;?></td>
                <td><?php echo $w40;?></td>
                <td><?php echo $w41;?></td>
                <td><?php echo $w42;?></td>
                <td><?php echo $w43;?></td>
                <td><?php echo $w44;?></td>
                <td><?php echo $w45;?></td>
                <td><?php echo $w46;?></td>
                <td><?php echo $w47;?></td>
                <td><?php echo $w48;?></td>
                <td><?php echo $w49;?></td>
                <td><?php echo $w50;?></td>
                <td><?php echo $w51;?></td>
                <td><?php echo $w52;?></td>
            </tr>
            <?php 
			
			} 
			?>
        </table>
        </div>
    </form>


    <?php
		mysqli_free_result($result);
	mysqli_close($conn);
}
	?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>