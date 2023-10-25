<?php
// Check if the $message variable is set (used for notification messages during operations such as add to cart etc)
   if(isset($message)){

       // Iterate through each message in the $message array.   
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Other meta tags and stylesheets go here -->
    <!-- ... -->
</head>
<body>

<header class="header">
<section class="flex"> <!--try by adding home.php in href instead of dashboard-->
    <a href="home.php" class="logo">Power<span>Pulse</span>
    </a>
    <!-- Right Side Of Navbar -->
           <!--- Navigation Bar -->

         <nav class="navbar">
         <a href="/shop3/home/home_view.php">Home</a>
         <a href="/shop3/about.php">About</a>
         <a href="/shop3/orders.php">Orders</a>
         <a href="/shop3/Shop.php">Shop</a>
         <a href="/shop3/Contact.php">Contact</a>
         </nav>


    <div class="icons">
    
        <?php         
        // Wishlist processing
        // PHP query to obtain all wishlisted items from database
        $count_wishlist_items = $connect->prepare("SELECT * FROM `wishlist` 
        WHERE user_id =?");
        //executes prepared query with user_id as parameter
        $count_wishlist_items->execute([$user_id]);
        $total_wishlist_counts = $count_wishlist_items->rowCount(); 
        
        /// Cart Processing
          // PHP query to obtain all cart items from database
        $count_cart_items = $connect->prepare("SELECT * FROM `cart` 
        WHERE user_id =?");
         //executes prepared query with user_id as parameter
        $count_cart_items->execute([$user_id]);
        $total_cart_counts = $count_cart_items->rowCount();

        ?>

         <!-- Navbar buttons -->
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="/shop3/search/search_page_view.php"><i class="fas fa-search"></i></a>
        
        <a href="/shop3/wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts;?>)</span></a>

        <a href="/shop3/cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts;?>)</span></a> 
        
        <div id="user-btn" class="fas fa-user"></div>
    </div>

     <!--- User profile box -->

     <div class="profile">
         <?php
            // PHP query to obtain user profile via id on profile box, after signing in          
            $select_profile = $connect->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <!-- When signed in  -->
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="/shop3/update_user.php" class="btn">Update Profile</a>
         <div class="flex-btn">
            <a href="/shop3/user_register.php" class="option-btn">Register</a>
            <a href="/shop3/user_login.php" class="option-btn">Login</a>
         </div>
         <a href="/shop3/components/user_logout.php" class="delete-btn" onclick="return confirm('Logout from your account?');">Logout</a>
         <!--<a href="user_login.php" class="delete-btn" onclick="return confirm('Logout from your account?');">Logout</a>-->
         <?php
            }else{
         ?>
                  <!-- When logged out  -->
          <p>Log in to your account</p>
         <div class="flex-btn">
            <a href="/shop3/user_register.php" class="option-btn">Register</a>
            <a href="/shop3/user_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

      
</section>
</header>
</body>
</html>