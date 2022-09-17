<header class="header">

   <div class="flex">

      <a href="#" class="logo">Hilltone</a>
      <h1 class="logo">Halaman Admin </h1>

      <nav class="navbar">
         <a href="index.php">Logout</a>
         <a href="admin.php">Tambah Produk</a>
         <a href="kelola_member_form.php">Kelola Member</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>