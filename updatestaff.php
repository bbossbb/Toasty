<?php
require_once('server.php');
	if(isset($_POST['subk'])) {
	    
	    $staffid= $_POST['staffid'];
        $staff_rank = $_POST['staff_rank'];
	    $staff_fname = $_POST['staff_fname'];
	    $staff_lname = $_POST['staff_lname'];
	    $staff_username = $_POST['staff_username'];
        $staff_password = $_POST['staff_password'];
		$staff_password1 = md5($staff_password);
	    $staff_salary = $_POST['staff_salary'];


	
	$q="UPDATE staff SET staffid='$staffid', staff_rank='$staff_rank',staff_fname = '$staff_fname',
	staff_lname= '$staff_lname',  staff_username = '$staff_username',staff_password = '$staff_password1', staff_salary= '$staff_salary'
    where staffid = '$staffid'"; 

	$result =$con->query($q);
		if(!$result){
			echo "Update failed. Error: ".$con->error ;
			return false;
		}
	header("Location: adminhome.php");	
	}
?>

