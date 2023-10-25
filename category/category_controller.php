    <?php 
    // Start a new or resume current session.
    session_start();

    // Include the database connection code.
    include '../components/connect.php';
   // Include the category_model file
    include 'category_model.php';

   // Check if the 'user_id' key exists in the session.
    if(isset($_SESSION['user_id'])){
        // Assign the 'user_id' from the session to the variable.
        $user_id = $_SESSION['user_id'];
    }else{     
        // If the 'user_id' is not set in the session, set it to an empty string.
        $user_id = '';
    }
    // Include the 'wishlist_cart.php' component.
    include '../components/wishlist_cart.php';
    ?>

    <?php
        // Check if there are products to display.
        if($select_products->rowCount() > 0){
        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
    ?>
        <!-- Product form -->
        <form action="" method="post" class="box">
        
        <!-- Hidden inputs for product details -->
        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
        <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
        
        <!-- Button to add to wishlist -->
        <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
        
        <!-- Link to quick view -->
        <a href="../quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
        
        <!-- Product image -->
        <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="" class="image">
        
        <!-- Product name -->
        <div class="name"><?= $fetch_products['name']; ?></div>
        
        <!-- Price and quantity input -->
        <div class="flex">
            <div class="price"><span>Tk </span><?= $fetch_products['price']; ?><span>/-</span></div>
            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
        
             <!-- Button to add to cart -->
            <input type="submit" value="add to cart" class="btn" name="add_to_cart" class="btn">
        </form>
        
        <?php
        }
        }else{
            // No products found to display.
            echo '<p class="empty">No Products Found</p>';
        }
        
        ?>