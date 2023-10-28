<?php 
// Define the database connection details.
$db_name = 'mysql:host=localhost;dbname=shop_db';
$user_name = 'root';
$user_password = '';

// Create a new PDO database connection.
$connect = new PDO($db_name, $user_name, $user_password);

?>