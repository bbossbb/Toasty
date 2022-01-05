<?php
require_once('server.php');
	if(isset($_POST['subsa'])) {
	    
	    $userid= $_POST['userid'];
        $addressid = $_POST['addressid'];
        $addresshouse = $_POST['addresshouse'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postcode = $_POST['postcode'];
        echo $userid;
        echo $addressid;
        echo $addresshouse;
        echo $city;
        echo $country;
        echo $postcode;
	
	$q=" UPDATE `address` SET `userid`= $userid,`addresshouse`=$addresshouse,`city`= '$city',`country`= '$country',`postcode`='$postcode' WHERE userid = $userid"; 

	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: home.php");	
	}
?>