<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toasty_db";

    //create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check Connection
    if (!$con){
        die("Connection Failed". mysqli_connect_error());

    }
    else{
}

?>