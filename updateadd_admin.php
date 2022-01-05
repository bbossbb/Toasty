<?php
require_once('server.php');
	if(isset($_POST['subp'])) {
	    
        $addressid = $_POST['addressid'];
        $addresshouse = $_POST['addresshouse'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$postcode = $_POST['postcode'];

	
	$q="UPDATE address SET addressid = '$addressid' ,addresshouse='$addresshouse', city='$city',country = '$country',
	postcode= '$postcode' where addressid = '$addressid'"; 
	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: adminhome.php");	
	}
?>