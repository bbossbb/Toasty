<?php
session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);

$orderid = random_num(20);
$paymentid = random_num(20);
$billingid = random_num(20);
$userid = $_SESSION['userid'];

if(isset($_POST['order']))  {
$q = "SELECT count(*) as count FROM CART where userid = $userid";
$result = mysqli_query($con, $q);
while($row = $result->fetch_array())
{
    $count = intval($row['count']);
    echo $count;
}
if($count==0){
    header('location: checkout.php');
}
else{

$paymenttypeid = $_POST['order'];
$ordernote = $_POST['ordernote'];
$shipmenttypeid = $_POST['shipmentid'];
$delivery_date = $_POST['date1'];
$timeslot = $_POST['timeslot'];
$query2 = "SELECT SUM(price) as sum FROM cart WHERE userid = $userid";
$result99 = mysqli_query($con,$query2);
$totalprice = mysqli_fetch_assoc($result99);
$totalprice2 = $totalprice['sum'];
//echo $totalprice2;

//echo $paymenttypeid ;
//echo "\n";
// echo $paymenttypeid = $_POST['order'];
// echo "\n";
// echo $ordernote = $_POST['ordernote'];
// echo "\n";
// echo $shipmenttypeid = $_POST['shipmentid'];
// echo "\n";
// echo $delivery_date = $_POST['date1'];
// echo "\n";
// echo $timeslotid = $_POST['timeslot'];
// echo $delivery_date;
if(!empty($delivery_date)){

$q12 ="SELECT paymenttypeid FROM paymenttype WHERE paymenttypeid = $paymenttypeid";
$result12 = mysqli_query($con,$q12); 
$paymenttypeid = mysqli_fetch_assoc($result12);
$paymenttypeid2 = $paymenttypeid['paymenttypeid'];

$q13 = "INSERT INTO payment (`paymentid`, `paymenttypeid`) VALUES (($paymentid),($paymenttypeid2))";
$result13 = mysqli_query($con,$q13); 

$q6 = "SELECT addressid FROM user where userid = $userid";
$result6 = mysqli_query($con,$q6); 
$addressid = mysqli_fetch_assoc($result6);
$addressid2 = $addressid['addressid'];
$staffid = "1";

$q10 = "INSERT INTO `order` (`orderid`,`userid`, `paymentid`,`staffid`, `totalprice`, `paymentstatus`,`billingid`) VALUES (($orderid),($userid),($paymentid),($staffid),($totalprice2),('0'),($billingid))";
if (mysqli_query($con,$q10)) {
    #echo "New record created successfully !";
    $q14 = "UPDATE `order` SET `ordertime`= (CURRENT_TIMESTAMP) WHERE orderid = $orderid";
    mysqli_query($con,$q14);
} else {
    //echo "Error: " . $q10 . "" . mysqli_error($con);
}

$q15 = "INSERT INTO `billing`(`billingid`, `orderid`, `shipmenttypeid`, `ordernote`, `deliverydate`, `timeslotid`) VALUES (($billingid),($orderid),($shipmenttypeid),('$ordernote'),('$delivery_date'),($timeslotid))";
if (mysqli_query($con,$q15)) {
    //echo "New record created successfully !";
} else {
    //echo "Error: " . $q15 . "" . mysqli_error($con);
}


$q19 = "SELECT * FROM PRODUCT,CART WHERE userid = $userid AND product.productid = cart.productid";
$result19 = mysqli_query($con,$q19);
while($row=$result19->fetch_array()){
    //echo ' test input ';
    $pname = $row['productname'];
    //echo $pname;
    $productid = $row['productid'];
    $quantity = intval($row['quantity']);
    $price = floatval($row['price']);
    $q18 = "INSERT INTO `order_product_detail`( `orderid`, `userid`, `productid`, `productname`, `pquantity`, `productprice`) VALUES (($orderid),($userid),($productid),('$pname'),($quantity),($price))";
    if  (mysqli_query($con,$q18)){
    }
    else{
        //echo "Error: " . $q11 . "" . mysqli_error($con);
        header('Refresh:0.0001; url = checkout.php');
    }
}


echo "Success";
header('location: checkout_successful.php');

}
else{
    echo "<script> alert('Something is missing please check !'); </script>";
     header('Refresh:0.0001; url = checkout.php');
}
}
}
else{
    //echo 'no';
    echo "<script> alert('Something is missing please check !'); </script>";
     header('Refresh:0.0001; url = checkout.php');

}




?>
