<?php 
// Include database connection code
include '../components/connect.php';

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
    // Initialize the variable to store fetched products.
        $fetch_products = '';

    // Get the category from the URL parameters.
        $category = $_GET['category']; 

    // Prepare a SQL query to select products based on the category name.
    $select_products = $connect->prepare("SELECT * FROM `products` WHERE name LIKE '%{$category}%'"); 
       
    // Execute the prepared query.
     $select_products->execute();
    ?>