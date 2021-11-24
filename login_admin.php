<?php 
session_start();

include ("server.php");
include ("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   // something was posted

   $admin_username = $_POST['username'];
   $admin_password = $_POST['password'];
   $admin_password1 = md5($admin_password);

   if(!empty($admin_username)&& !empty($admin_password))
   {
    // read from database

    $query = "SELECT * FROM admin WHERE username = '$admin_username' limit 1";
    $result = mysqli_query($con,$query);

    if($result)
    {
      if($result && mysqli_num_rows($result)>0)
        {
            
            $admin_data = mysqli_fetch_assoc($result);
            if($admin_data['password'] == $admin_password1){
              $_SESSION['adminid'] = $admin_data['adminid']; 
              header("Location: adminhome.php");
              die;
            }
            else{
              echo "<script> alert('Wrong Username or Password !'); </script>";
            }
        }
    }
    echo "<script> alert('Wrong Username or Password !'); </script>";
     
   }
   else{
     echo "<script> alert('Please enter some valid information'); </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content = "width = device-width, initial-scale=1.0">
    <link rel="icon" href="img/fav-icon.PNG" type="image/x-icon" />


    <title>Toasty | Admin Sign In</title>
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
         
                </li>
              </ul>
            </li>
          
          </ul>
        </nav>
        <div class="header__logo"><a class="ps-logo" href="index.php"><img src="img/logo1.PNG"></a></div>
        <nav class="header__navigation right">
         
          
        </nav>
      </div>  

      <div class="header__right">
       
    </header>
    
    
    </div>

  
    <div class="ps-page--about">
      <div class="ps-hero__container">
        <div class="ps-breadcrumb">
            <div class="ps-section__header">
                <i class="chikery-tt1"></i>
                  <h3>Sign In</h3>
            </div>
              
            
   
    
            
    <form method = "post">
    <style>
      label{
        font-size:20px;
      }

    </style>
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
    <div class="container">
  
          <div class = "center">
    <div class = "box">
      <div class="ps-breadcrumb">
        <label for = "username"> Username </label>
      </div>
        <input  type = "text" name = "username">
            
      <div class="ps-breadcrumb">
        <label for = "password"> Password </label>
      </div>
        <input type = "password"  name = "password">
        </div>
      <div class="ps-breadcrumb">
      </div>
      </div>

      </div>
      <div class="ps-breadcrumb">
        <button type = "submit" value = "login" class="ps-btn ps-product__add-to-cart"> Log in </button>
      </div>
            
            
      <p> Only for Toasty Admin </p>

</form> 

</div>
</div>
        </div>
        <div class="ps-section ps-contact">
            <div id="contact-map" data-address="17 Queen St, Southbank, Melbourne 10560, Australia" data-title="Funiture!" data-zoom="17"></div>
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
    
    <script src="plugins/jquery-1.12.4.min.js"></script>
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script src="plugins/imagesloaded.pkgd.js"></script>
    <script src="plugins/masonry.pkgd.min.js"></script>
    <script src="plugins/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery.matchHeight-min.js"></script>
    <script src="plugins/slick/slick/slick.min.js"></script>
    <script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="plugins/slick-animation.min.js"></script>
    <script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="plugins/jquery.slimscroll.min.js"></script>
    <script src="plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="plugins/gmap3.min.js"></script>

</body>
</html>