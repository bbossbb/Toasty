<?php

session_start();

if(isset($_SESSION['staffid']))
{
    unset($_SESSION['staffid']);
}

header("location: login_staff.php");
die;

?>