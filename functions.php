<?php

function check_login($con){
    if(isset($_SESSION['userid']))
    {
        $userid = $_SESSION['userid'];
        
        $id = $_SESSION['userid'];
        $query = "SELECT * FROM user where userid = '$id' limit 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    

    

    header("location: home.php");
}
    //redirect to login
    else{
        header("location: index.php");
    }
}

function check_login_staff($con){
    if(isset($_SESSION['staffid']))
    {

        $id = $_SESSION['staffid'];
        $query = "SELECT * FROM staff where staffid = '$id' limit 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0)
        {
            $staff_data = mysqli_fetch_assoc($result);
            return $staff_data;
        }
    

    //redirect to login
    header("location: staffhome.php");
    
}

    else{
        header("location: login_staff.php");
    }
}

function check_login_admin($con){
    if(isset($_SESSION['adminid']))
    {

        $id = $_SESSION['adminid'];
        $query = "SELECT * FROM admin where adminid = '$id' limit 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0)
        {
            $admin_data = mysqli_fetch_assoc($result);
            return $admin_data;
        }
    

    //redirect to login
    header("location: adminhome.php");
    
}

    else{
        header("location: login_admin.php");
    }
}

function random_num($length){
    $text = "";
    if ($length < 4)
    {
        $length = 4;
    }
    $len = rand(2,$length);

    for ($i = 0 ; $i < $len; $i++){
        $text .= rand(0,9);
    }
    return $text;

}

function runQuery($query){
    $result = mysqli_query($con, $query);

    while($row = myqli_fetch_assoc($result)){
        $resultset[] = $row;
    }
    if(!empty($resultset))
    return $resultset;
}

function numRows($query){
    $result = mysqli_query($con,$query);
    $rowcount = mysqli_num_rows($result);
    return $rowcounts;
}

function numRows2($q){
    $result1 = mysqli_query($con,$q);
    $rowcount = mysqli_num_rows($result1);
    return $rowcounts2;
}

function sumNum($query){

}