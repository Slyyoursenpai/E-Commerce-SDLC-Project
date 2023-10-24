<?php 


include 'quick_view_model.php';
include '../components/wishlist_cart.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickview</title>
</head>
<body>
    <!--- Font Awesome Plug-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--- CSS Link-->
    <link rel="stylesheet" href="../css/style.css">

<?php 
  include '../components/user_header.php';
?>

    <!--- Quick View Section Starts-->

    <section class="quick-view"> 
        <h1 class="heading">Quick View</h1>
     
        <?php 
             include 'quick_view_controller.php';
        ?>
        
    </section>

 <!--- Quick View Section Ends-->

 <?php include '../components/footer.php'; ?>

   <!----- JS Link -->
   <script src="../js/script.js"></script> 


</body>
</html>