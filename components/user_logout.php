<?php
include 'connect.php';
session_start();
session_unset();
session_destroy();

header('location:/shop3/home/home_view.php');
?>