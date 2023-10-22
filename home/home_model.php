<?php 
include '../components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}
?>

    <?php
      $select_products = $connect->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();

      ?>
