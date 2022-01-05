<?php
require_once('server.php');
	if(isset($_POST['submi'])) {
	    
        $productid = $_POST['productid'];
		$productprice = $_POST['productprice'];
		$pquantity = $_POST['pquantity'];

	$q="UPDATE product SET productid = '$productid' , productprice='$productprice',pquantity = $pquantity where productid = '$productid'"; 
	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: productstock.php");	
	}
?>