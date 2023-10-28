    <?php
    // Start a new or resume the current session.
    session_start();

    // Include the database connection code.
    include '../components/connect.php';
    // Include the 'quick_view_model.php' file.
    include 'quick_view_model.php';

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

    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
    <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
    <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
    
        <!-- Product images -->
    <div class="image-container">
            <!--- can include main image div class-->
            <div class="big-image">
            <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="big img">
            </div>

        <!-- Additional product images -->
            <div class="small-image">
            <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="small img 1">
            <img src="../uploaded_img/<?= $fetch_products['image_02']; ?>" alt="small img 2">
            <img src="../uploaded_img/<?= $fetch_products['image_03']; ?>" alt="small img 3">

            </div>

    </div>

        <!-- Product content -->
    <div class="content">
        <!--- Product name -->  
    <div class="name"><?= $fetch_products['name']; ?></div>
            <div class="flex">
            <!--- Product price and quantity -->  
            <div class="price"><span>Tk </span><?= $fetch_products['price']; ?>
            <span>/-</span></div>
            <input class="qty" type="number" name="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            
            </div>

            <!--- Product details -->  
            <div class="details">
            <?= $fetch_products['details'];?>
            </div>

            <!--Cart and wishlist buttons--->
            <div class="flex-btn">  <!---- name takes to link if logged in --->
            <input class="btn" type="submit" value="add to cart" name="add_to_cart">
            <input class="option-btn" type="submit" value="add to wishlist"  name="add_to_wishlist">
            </div>

    </div>

    </form>

    <?php
     
    }
        }else{
           
    // No products found to display.
    echo '<p class="empty">No Products Found</p>';
        
    }

    ?>