<?php
require_once('server.php');
	if(isset($_POST['submi'])) {
	    
        $productid = $_POST['productid'];
		$productprice = $_POST['productprice'];
		$pquantity = $_POST['pquantity'];


		$q0 = "call add_item($productid, $productprice,$pquantity) ";
		$result0 = $con->query($q0);
		if($result0){
			echo "YAY!";
		}
	//$q="UPDATE product SET productid = '$productid' , productprice='$productprice',pquantity = $pquantity where productid = '$productid'"; 
	//	$result =$con->query($q);
	//	if(!$result){
	//		echo "Update failed. Error: ".$con->error ;
	//		return false;
	//	}
	header("Location: productstock_admin.php");	
	}
?>