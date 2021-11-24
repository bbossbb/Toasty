<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $_SESSION['userid'];



$q1 = "SELECT * FROM CART,PRODUCT WHERE userid = $userid AND product.productid = cart.productid ";
$result1 = mysqli_query($con,$q1);
while($row= $result1->fetch_array()){
  $pquantity = intval($row['pquantity']);
  $quantity1 = intval($row['quantity']);
  $pidtemp = $row['productid'];

  
  
  $q2 = "UPDATE `product` SET `pquantity`=  $pquantity - $quantity1 WHERE productid = $pidtemp";
  mysqli_query($con,$q2);
 
}



$q3 = "DELETE FROM cart WHERE userid = $userid";
mysqli_query($con,$q3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content = "width = device-width, initial-scale=1.0">
    <link rel="icon" href="img/fav-icon.PNG" type="image/x-icon" />
    <title>Toasty | Payment Successful</title>
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
    
    

  
    <div class="ps-page--about">
      <div class="ps-hero__container">
        <div class="ps-breadcrumb">
            <div class="ps-section__header">
                <i class="chikery-tt1"></i>
                <div class="ps-breadcrumb">
                  <h3>Your Order Has Been Created !</h3>
               
                  </div>
                  <div class="ps-breadcrumb">
                  <h4>Please wait for our Staff to confirm your payment!</h4>
            </div>
              
            
   
    
            

      <div class="ps-breadcrumb">
      <a href="home.php ">Back to homepage</a>
      </div>
      <div class="ps-breadcrumb">
      <a method = 'post' input type = 'submit ' value="logout" href="logout.php">  logout </a>
      
        
      </div>
  

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