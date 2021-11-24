<?php 
session_start();

include ("server.php");
include ("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   // something was posted

   $username = $_POST['username'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $password = $_POST['password'];
   $password2 = $_POST['password2'];
  // echo $password;
   //echo $password2;
   $addresshouse = $_POST['addresshouse'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $postcode = $_POST['postcode'];

   $passwordhash = md5($password);
   //echo $username;
   $checkuser = "SELECT username FROM user WHERE username = '$username'";
   if($check = mysqli_query($con,$checkuser)){
    // echo "NO ERROR";
   }
   else{
     //echo "ERROR";
   }


   $checkemail = "SELECT email FROM user WHERE email = '$email'";
   if($check1 = mysqli_query($con,$checkemail)){
    // echo "NO ERROR 1";
   }
   else{
     //echo "ERROR 1";
   }


   while($row=$check->fetch_array()){
     $result =  $row['username'];
   }
   while($row=$check1->fetch_array()){
    $result1 =  $row['email'];
  }
   if(!empty($result)){
    echo "<script> alert('This Username already Taken !'); </script>";
   }
   else{


    if(!empty($result1)){
      echo "<script> alert('This Email already Taken !'); </script>";
    }
else{
  
   if(!empty($username) && !empty($password) && !empty($addresshouse)){
    if($password == $password2){
      
      
       
  
     $userid = random_num(20);
     $addressid = random_num(20);
     $query1 = "INSERT INTO address (addressid,userid,addresshouse,city,country,postcode) values ('$addressid','$userid','$addresshouse','$city','$country','$postcode')";
     mysqli_query($con,$query1);
     $query = "INSERT INTO user (userid,addressid,username,fname,lname,email,phone,password) values ('$userid','$addressid','$username','$fname','$lname','$email','$phone','$passwordhash')";
     mysqli_query($con,$query);
     echo "<script> alert('Registration Successful'); </script>";
     header('Refresh:0.01; url = index.php');
     die;
    }
    else{
      echo "<script> alert('Password dont match !'); </script>";
    }
    }
    else{
      echo "<script> alert('Please enter some valid information'); </script>";
    }
    
      
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content = "width = device-width, initial-scale=1.0">
    <link rel="icon" href="img/fav-icon.PNG" type="image/x-icon" />
    <title>Toasty | Registration</title>

    <title>Toasty | Registration</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="plugins/chikery-icon/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header header--default" data-sticky="true">
      <div class="header__left">
        <p><i class="fa fa-clock-o"></i> 08:00 am - 08:30 pm</p>
      </div>
      <div class="header__center">
        <nav class="header__navigation left">
          
        </nav>
        <div class="header__logo"><a class="ps-logo" href="index.php"><img src="img/logo1.PNG"></a></div>
        <nav class="header__navigation right">
         
           
        </nav>
      </div>  

      <div class="header__right">
       
    </header>
    
    

    <div class="ps-page--about">
        
    <div class="ps-hero__container">
        <div class="ps-breadcrumb">
              <div class="ps-section__header">
              
                  <i class="chikery-tt1"></i>
                  <h3>Register</h3>
              </div>
        

    
            
    <form method = 'POST'>
    <div class="container">
    <div class = "center">
    <div class = "form-group">
            <div class="ps-breadcrumb">
            <style> label{
              font-size: 20px;
            } </style>
<style>


body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background:white;
}

.box input[type = "text"],.box input[type = "password"],.box input[type = "email"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 1px solid #191919;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: black;
  border-radius: 24px;
  transition: 0.25s;
}

.box input[type = "text"]:focus,.box input[type = "password"]:focus,.box input[type = "email"]:focus{
  width: 280px;
  border-color: #d9cd9c;
}



    </style>
            <label for = "username"> Username </label>
            </div>
            <div class="box">
            <input type = "text" name = "username">
            
            <div class="ps-breadcrumb">
            <label for = "fname"> Firstname </label>
            </div>
            <input type = "text" name = "fname">

            <div class="ps-breadcrumb">
            <label for = "lname"> Lastname </label>
            </div>
            <input type = "text" name = "lname">

            <div class="ps-breadcrumb">
            <label for = "email"> Email </label>    
            </div>
            <input type = "email" name = "email">

            <div class="ps-breadcrumb">
            <label for = "phone"> Phone No. </label>
            </div>
            <input type = "text" name = "phone">
            
            <div class="ps-breadcrumb">
            <label for = "password"> Password </label>
            </div>
            <input type = "password" name = "password">

            <div class="ps-breadcrumb">
            <label  for = "password_2"> Confirm Password </label>  
            </div>    
            <input type = "password" name = "password2">

            <div class="ps-breadcrumb">
            <label for = "addresshouse"> House No. </label>  
            </div>    
            <input type = "text" name = "addresshouse">

            <div class="ps-breadcrumb">
            <label for = "city"> City </label>  
            </div>    
            <input type = "text" name = "city">

            <div class="ps-breadcrumb">
            <label for = "country"> Country </label>  
            </div>    
            <input type = "text" name = "country">

            <div class="ps-breadcrumb">
            <label for = "postcode"> Postcode </label>  
            </div>    
            <input type = "text" name = "postcode">
            </div>
            </div>
            
            </div>
            <div class="ps-breadcrumb">
            <button type = "submit" value = "submit" class="ps-btn ps-product__add-to-cart"> Register </button>
            </div>
            
        <p> Already a member? <a href = "index.php">Sign in</a></p>

</form> 
</div>
</div>
</div>
        </div>

        <footer class="ps-footer">
      <div class="ps-footer__content">
        <div class="container">
          <div class="ps-footer__left">
            <form class="ps-form--footer-subscribe" action="#" method="get">
              <h3>Get news & offer</h3>
              <p>Sign up for our mailing list to get latest update and offers</p>
              <div class="form-group--inside">
                <input class="form-control" type="text" placeholder="Your email...">
                <button><i class="fa fa-arrow-right"></i></button>
              </div>
              <p>* Don't worry, we never spam</p>
            </form>
          </div>
          <div class="ps-footer__center">
            <div class="ps-site-info"><a class="ps-logo" href="#"><img src="img/logo1.PNG" width = "200" height = " 200" alt=""></a>
              <p>000 Phaholyothin Street, Rangsit 12120 Patumthani, Thailand</p>
              <p>Email:<a href = "mailto: 6222782698@g.siit.tu.ac.th">  6222782698@g.siit.tu.ac.th</a></p>
              <p>Phone:<span class="ps-hightlight"> +669 123 1233</span></p>
            </div>
          </div>
          <div class="ps-footer__right">
            <aside class="widget widget_footer">
              <h3 class="widget-title">Opening Time</h3>
              <p>Monday - Friday:  <span>08:00 am - 08:30 pm</span></p>
              <p>Saturday - Sunday:  <span>10:00 am - 16:30 pm</span></p>
              <ul class="ps-list--payment-method">
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
      <div class="ps-footer__bottom">
        <div class="container">
          <ul class="ps-list--social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
       
        </div>
      </div>
    </footer>    



</body>
</html>