<?php 

include 'category_model.php';
include '../components/wishlist_cart.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <!--- Font Awesome Plug-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--- CSS Link-->
    <link rel="stylesheet" href="../css/style.css">

<?php 
  include '../components/user_header.php';
?>

<!---catetgory section starts -->
<section class="products">
    <h1 class="heading"> Browse <?php $category = $_GET['category']; 
        echo $category?></h1> <!--GET method is used to here (Remove this for error) to use dynamic category name from database-->
    <div class="box-container">
    
    <?php 
            include 'category_controller.php';
    ?>

</div>
</section>
<!---category sections ends -->

<?php include '../components/footer.php'; ?>

   <!----- JS Link -->
   <script src="../js/script.js"></script> 

</body>
</html>