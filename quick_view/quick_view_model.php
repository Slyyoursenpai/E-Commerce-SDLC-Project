<?php 

// Include the database connection code.
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
        // Get the product ID from the URL parameters.
        $pid = $_GET['pid']; 
        
        // Prepare a SQL query to select a product by its ID.
        $select_products = $connect->prepare("SELECT * FROM `products` WHERE id = ?"); 

        // Execute the prepared query, passing the product ID as a parameter.        
        $select_products->execute([$pid]);
 
?>