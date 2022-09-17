<header class="header">

   <div class="flex">

      <a href="#" class="logo">Hilltone</a>
      <h1 class="logo">Halaman Member </h1>

      <nav class="navbar">
          <a href="index.php">Logout</a>
         <a href="products.php">Produk Kami</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">Pesanan Anda <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>