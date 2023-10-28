<?php
// Include the database connection code.
include '../components/connect.php';

// Check if the form was submitted with a search term.
if (isset($_POST['search_box'])) {
    $searchTerm = $_POST['search_box'];  ////// same thing as on search_page but pressing enter resets page without this code on search_page.php. /// fixed 
    
    // Sanitize the search term to prevent SQL injection.
    $searchTerm = filter_var($searchTerm, FILTER_SANITIZE_STRING);

    // Prepare a SQL query to select products with names containing the search term.
    $select_products = $connect->prepare("SELECT * FROM `products` WHERE name LIKE :searchTerm");
    
    // Bind the sanitized search term to the prepared statement.
    $select_products->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    
    // Execute the prepared query.
    $select_products->execute();

    // Check if there are products matching the search term.
    if ($select_products->rowCount() > 0) {
        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
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
    } else {
        // No products matching the search term found.
        echo '<p class="empty">No Products Found</p>';
    }
}
?>
