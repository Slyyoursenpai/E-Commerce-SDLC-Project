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
        $pid = $_GET['pid']; 
        $select_products = $connect->prepare("SELECT * FROM `products` WHERE id = ?"); 
        $select_products->execute([$pid]);
 
?>