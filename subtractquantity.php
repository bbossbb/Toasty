<?php
session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);

    $userid = $user_data['userid'];
    $productid = $_GET['productid'];
    echo $productid;
        echo "TEST";

$q99 = "SELECT productprice FROM PRODUCT WHERE productid = $productid";
$result99 = mysqli_query($con,$q99);
while($row=$result99->fetch_array()){
  echo $row['productprice'];
  $price = $row['productprice'];
  }


$q1 = "UPDATE cart SET quantity = quantity - 1 WHERE productid = $productid AND userid =$userid";
mysqli_query($con,$q1);

$q2 = "UPDATE cart SET price = quantity * $price  WHERE productid = $productid AND userid = $userid";
mysqli_query($con,$q2);
echo "UPDATE";

$q69 = "SELECT quantity FROM cart WHERE userid = $userid AND productid = $productid";
$result69 = mysqli_query($con,$q69);
while($row=$result69->fetch_array()){
    $quantity1 = intval($row['quantity']);
    echo $quantity1;
}
    if($quantity1 == 0){
        $q0 = "DELETE FROM cart WHERE userid = $userid AND productid = $productid";
        mysqli_query($con,$q0);
    }

	

header("Location: shopping-cart.php");	
	
?>