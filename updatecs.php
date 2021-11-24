<?php
require_once('server.php');
	if(isset($_POST['subs'])) {
	    
	    $userid= $_POST['userid'];
        $username = $_POST['username'];
	    $fname = $_POST['fname'];
	    $lname = $_POST['lname'];
	    $email = $_POST['email'];
        $phone = $_POST['phone'];
	    $password = $_POST['password'];
		$password1 = md5($password);


	
	$q="UPDATE user SET userid='$userid', username='$username',fname = '$fname',
	lname= '$lname',  email = '$email',phone = '$phone', password= '$password1'
    where userid = '$userid'"; 

	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: home.php");	
	}
?>