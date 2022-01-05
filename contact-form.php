<?php
session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $_SESSION['userid'];
if(isset($_POST['submit-btn'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    }
    else{
        echo 'no';
    }
    echo $userid;
    echo $name;
    echo $email;
    echo $phone;

$q44 = "INSERT INTO `contact`(`userid`, `name`, `email`, `phone`, `message`) VALUES (('$userid'),('$name'),('$email'),('$phone'),('$message'))";
mysqli_query($con,$q44);
echo "done";
header('location: contact-form-sent.php');
?>

