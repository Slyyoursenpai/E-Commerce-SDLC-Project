<?php 
include '../components/connect.php';

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

include '../components/wishlist_cart.php';

?>


    <?php
        $fetch_products = '';
        $category = $_GET['category']; 
        $select_products = $connect->prepare("SELECT * FROM `products` WHERE name LIKE '%{$category}%'"); 
        $select_products->execute();
    ?>