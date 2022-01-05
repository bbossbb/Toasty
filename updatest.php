<?php
require_once('server.php');
	if(isset($_GET['increase'])) {
	    
	    $quantity= $_GET['quantity'];
        $productid_temp = $_GET['productid'];



	
	$q="UPDATE cart SET quantity= $quantity + 1 ";

	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: shopping-cart.php");	
    }
?>

