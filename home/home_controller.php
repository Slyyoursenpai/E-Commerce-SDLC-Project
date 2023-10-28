      <?php
      // Start output buffering and initialize sessions.
      ob_start();
      session_start();

      // Include necessary PHP files.
      include '../components/connect.php'; // Include database connection code.
      include 'home_model.php';  // Include the home model.
      include '../components/wishlist_cart.php'; // Include wishlist and cart related components
      // Clean the output buffer.
      ob_end_clean();
      ?>

    <?php
      // check if there are products in the database
      if($select_products->rowCount()>0){
         // iterate through the fetched products
       while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
    
      ?>
       <!--- Product function buttons -->
      <form action="" method="post" class="swiper-slide slide">
         <!-- Hidden input for product id -->
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <!-- Hidden input for product name -->
      <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <!-- Hidden input for product price -->
      <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <!-- Hidden input for product image -->
      <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
      
      <!-- Button to add to wishlist -->
         <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                  
      <!-- Link to quick view -->
       <a href="../quick_view/quick_view_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      
         <!-- Product image -->
      <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
      
       <!-- Product name -->
      <div class="name"><?= $fetch_products['name']; ?></div>
                  
         <!-- Product price and quantity input -->
         <div class="flex">
         <div class="price"><span>Tk </span><?= $fetch_products['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>

      <!--- Button to add to cart -->
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>

      <?php
         }
         }else{
         // No products found in the database
          echo '<p class="empty">No Products Added Yet</p>';
         }
      ?>