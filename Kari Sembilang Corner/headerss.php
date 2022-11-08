<header class="header">

   <div class="flex">

      <a href="homepage.html" class="logo">Kari Sembilang Corner</a>

      <nav class="navbar">
         <a href="home.php">HOME</a>
         <a href="menu.php">MENU</a>
         <a href="about.php">ABOUT US</a>
         <a href="contact.php">CONTACT</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart"><img src="cart.png" width="30px" height="30px" /> <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>