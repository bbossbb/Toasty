<?php
session_start();
include('server.php');
include('functions.php');
$user_data = check_login($con);
$userid = $user_data['userid'];
$q3 = "SELECT * FROM cart where userid = $userid";
$result3 = mysqli_query($con,$q3);
while ($row = $result3 -> fetch_assoc()){
    $temp = $row['productid'];
    $q4 = "UPDATE product SET pquantity = pquantity + 1 WHERE productid = $temp";
    mysqli_query($con,$q4);
}


$q4 = "DELETE FROM cart where userid = $userid";
mysqli_query($con,$q4);

header('Location:shopping-cart.php');
?>