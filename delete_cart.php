<?php
session_start();
include('server.php');
include('functions.php');
$user_data = check_login($con);
$userid = $user_data['userid'];

$productid_temp = $_GET['productid'];
$q="DELETE FROM cart WHERE userid = $userid AND productid = $productid_temp";
mysqli_query($con,$q);


header('Location: shop-page-1.php');
?>