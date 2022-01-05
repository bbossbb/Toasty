<?php 
session_start();
include('server.php');
include('functions.php');
$user_data = check_login($con);

$productid_temp = $_GET['productid'];
$userid = $user_data['userid'];

$q0 = "SELECT pquantity FROM product WHERE productid = $productid_temp";
$result0 = mysqli_query($con,$q0);
while($row=$result0->fetch_array()){
  //echo $row['pquantity'];
  $checkquantity = $row['pquantity'];
  }
//echo $userid;
//echo $checkquantity;
if($checkquantity > 0){

$q69 = "SELECT Count(productid) as Count1 FROM cart where productid = $productid_temp AND userid = $userid";
$result69 = mysqli_query($con,$q69);


$q99 = "SELECT productprice FROM PRODUCT WHERE productid = $productid_temp";
$result99 = mysqli_query($con,$q99);
while($row=$result99->fetch_array()){
  //echo $row['productprice'];
  $price = $row['productprice'];
  }

while($row=$result69->fetch_array()){
//echo $row['Count1'];
$counts = $row['Count1'];
}
if($counts == '0'){
  //echo "NOTHING IN ";
  $q16="INSERT INTO cart(`userid`,`productid`,`quantity`,`price`) VALUES ('$userid','$productid_temp',1,'$price')";
  mysqli_query($con,$q16);
  //echo "INSERT1";
  header('Refresh:0.01; url = shop-page-1.php');
}
else{
  if($counts==1){
    $q1 = "UPDATE cart SET quantity = quantity + 1 WHERE productid = $productid_temp AND userid =$userid";
    mysqli_query($con,$q1);
    $q2 = "UPDATE cart SET price = quantity * $price  WHERE productid = $productid_temp AND userid = $userid";
    mysqli_query($con,$q2);
    echo "UPDATE";
  }


  //echo "SECOND";
  header('Refresh:0.01; url = shop-page-1.php');
}
}
else{
  echo "<script>  alert('Out of Stock !'); </script>";
  
  header('Refresh:0.01; url = shop-page-1.php');
}




?>

