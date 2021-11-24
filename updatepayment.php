<?php
require_once('server.php');
	if(isset($_POST['submit2'])) {
	    $paymentstatus = $_POST['paymentstatus'];
        $paymentid = $_POST['paymentid'];
		echo $paymentstatus;
        echo $paymentid;

	$q="UPDATE `order` SET paymentstatus = '$paymentstatus' WHERE paymentid = '$paymentid'"; 
	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: staff_payment.php");	
	}
?>