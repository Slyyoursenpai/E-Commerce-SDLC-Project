<?php 
// include the database connection code.
include '../components/connect.php';

// Start a new or resume current session.
session_start();

// check if the 'user_id' key exists in the session.
if(isset($_SESSION['user_id'])){
    // Assign the 'user_id' from the session to the variable
    $user_id = $_SESSION['user_id'];
}else{
    // If the 'user_id' is not set in the session, set it to an empty string. 
    $user_id = '';
}
?>

    <?php

    // Prepare a SQL query to select up to 6 products from the 'products' table.
      $select_products = $connect->prepare("SELECT * FROM `products` LIMIT 6");
    // Execute the prepared query.
    $select_products->execute();

    ?>
