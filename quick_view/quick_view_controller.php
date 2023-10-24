    <?php 
    session_start();

    include '../components/connect.php';
    include 'quick_view_model.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    include '../components/wishlist_cart.php';
    ?>


    <?php

    if($select_products->rowCount() > 0){
    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
    ?>

    <form action="" method="post" class="box">

    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
    <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
    <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
    

    <div class="image-container">
            <!--- can include main image div class-->
            <div class="big-image">
            <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="big img">
            </div>

            <div class="small-image">
            <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="small img 1">
            <img src="../uploaded_img/<?= $fetch_products['image_02']; ?>" alt="small img 2">
            <img src="../uploaded_img/<?= $fetch_products['image_03']; ?>" alt="small img 3">

            </div>

    </div>

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
            echo '<p class="empty">No Products Found</p>';
            }

    ?>