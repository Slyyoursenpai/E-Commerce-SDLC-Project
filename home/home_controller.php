        <?php
        include '../components/connect.php';
        include 'home_model.php';
        include '../components/wishlist_cart.php';
        ?>

    <?php

      if($select_products->rowCount()>0){
       while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
    
      ?>
       <!--- Product function buttons -->
      <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_products['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="../quick_view/quick_view_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="flex">
         <div class="price"><span>Tk </span><?= $fetch_products['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>

      <?php
         }
         }else{
          echo '<p class="empty">No Products Added Yet</p>';
         }
      ?>