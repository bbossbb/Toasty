<?php

session_start();
include("server.php");
include("functions.php");
$staff_data = check_login_staff($con);

?>

<!DOCTYPE html>
<html lang="en">
  
<!-- homepage-231:54-->
<head>

    <link rel="icon" href="img/fav-icon.PNG" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Toasty | Staff Edit Customer</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
          <ul class="menu">
          <li class="current-menu-item menu-item-has-children"><a href="staffhome.php">Customer Information</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
</li>
            <li class="current-menu-item menu-item-has-children"><a href="staffcontactform.php">Contact Response</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
</li>
          </ul>
        </nav>
        
        <div class="header__logo"><a class="ps-logo" href="staffhome.php"><img src="img/logo1.PNG"></a></div>
        <nav class="header__navigation right">
          <ul class="menu">
            <li class="current-menu-item menu-item-has-children"><a href="productstock.php">Product Stock</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            <li class="current-menu-item menu-item-has-children"><a href="staff_payment.php">Payment</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            <li class="current-menu-item menu-item-has-children"><a href="orderdetail_staff.php">Order</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            
           
        </nav>
      </div>

      <div class="header__right">


        <!--Logout Button--><div class="header__actions"><a method = 'post' input type = 'submit ' value="logout" href="logout_staff.php">  logout </a>
        
      </div>
    </header>
    
    <!--include search-sidebar-->
    <div id="homepage-2">
      <div class="ps-home-banner bg--cover" data-background="img/bg/home-2/home-banner.jpg">
        <h1>CUSTOMER INFORMATION ------ KEEP SECRET</h1>
        
        <h1></h1>

      
      </div>
      <div class="ps-section ps-contact" data-background="img/bg/home-2/special-cake.png">
      <div class="ps-breadcrumb">
      <div class="container">
      <h2>Edit User Profile</h2>
          
   
    
      <div class="ps-section__header">
                 <h3> Edit Customer Information </h3>
                </div>
                     <table font-size = "8px"; align ="center" border = "2px"; style = "width:800px; line-heigth: 80px;">
                     <style>
                table, td {
                font-size: 20px;
                }
                th{
                    font-size: 25px;
                }
                </style>
                    <style>


body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background:white;
}

.box input[type = "text"],.box input[type = "password"]{
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
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 280px;
  border-color: #d9cd9c;
}



    </style>
                  <div class="ps-section__header">
                    <div class = "box">
                 <?php 

                    $userid = $_GET['userid'];
                    $q="SELECT * FROM user where userid = '$userid'" ;
					$result=$con->query($q);
					if(!$result){
						echo "Select failed. Error: ".$con->error ;
						return false;
					}

                    echo "<form action='updateus.php' method='post'>";
                    while($row=$result->fetch_array()){
                  
					
                    echo"<p>Username</p>";
                    echo "<br>";
					echo "<input  type='text' name='username' value=".$row['username'].">";
                    echo "<br>";
                    echo "<br>";

					echo"<p>Firstname</p>";
                    echo "<br>";
					echo "<input  type='text' name='fname' value=".$row['fname'].">";
                    echo "<br>";
                    echo "<br>";

                    echo"<p>Lastname</p>";
                    echo "<br>";
					echo "<input  type='text' name='lname' value=".$row['lname'].">";
                    echo "<br>";
                    echo "<br>";

                    echo"<p>Email</p>";
                    echo "<br>";
					echo "<input  type='text' name='email' value=".$row['email'].">";
                    echo "<br>";
                    echo "<br>";

                    echo"<p>Phone</p>";
                    echo "<br>";
					echo "<input  type='text' name='phone' value=".$row['phone'].">";
                    echo "<br>";
                    echo "<br>";

                    echo"<p>Password</p>";
                    echo "<br>";
					echo "<input  type='password' name='password' value=''>";
                   
                    
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<input type='hidden' name='userid' value=".$row['userid']." >";
					echo "<div class='center'>";
					echo "<input class = 'ps-btn ps-product__add-to-cart' type='submit' name='sub' value='submit'>";			
                    
						
                    }
    ?>
                <tr></tr>
				<?php  ?> 
                </div> 
                </div>
                 </table>
                
			
            </div>
                </div>
                <div class="ps-section__header">
               
            </div>

      </div>

        </div>

        </div>
      </div>
      <div class="ps-section ps-home-blog">
        <div class="container">

      </div>
    </div>
    <footer class="ps-footer">
      <div class="ps-footer__content">
        <div class="container">
      
          </div>
          <div class="ps-footer__center">
            <div class="ps-site-info"><a class="ps-logo" href="staffhome.php"><img src="img/logo1.PNG"width="200" 
              height="200" alt=""></a>
              <p>000 Phaholyothin Street, Rangsit 12120 Patumthani, Thailand</p>
              <p>Email:<a href = "mailto: 6222782698@g.siit.tu.ac.th">  6222782698@g.siit.tu.ac.th</a></p>
              <p>Phone:<span class="ps-hightlight"> +669 123 1233</span></p>
            </div>
          </div>
          <div class="ps-footer__right">
            
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
    </footer>
   
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
      <div class="ps-search__content">
        <form class="ps-form--primary-search" action="#" method="post">
          <input class="form-control" type="text" placeholder="Search for...">
          <button><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <!-- Plugins-->
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
    <!-- Custom scripts-->
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
  </body>

<!-- homepage-232:47-->
</html>
