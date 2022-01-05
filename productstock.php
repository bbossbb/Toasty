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
    <title>Toasty | Staff Stock</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
    <header class="header header--mobile" data-sticky="false">
      <div class="header__content">
        <div class="header__left"><a class="ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a></div>
        <div class="header__center"><a class="ps-logo" href="staffhome"><img src="img/logo1.PNG" alt=""></a></div>
        <div class="header__right">
          <div class="header__actions"><a href="#"><i class="fa fa-heart-o"></i></a></div>
        </div>
      </div>
    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
      
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
      <div class="ps-panel__header">
        <h3>Menu</h3>
      </div>
      <div class="ps-panel__content">
       
      </div>
    </div>
    <div class="navigation--list">
      <div class="navigation__content"><a class="navigation__item active" href="home.php"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div id="homepage-2">
      <div class="ps-home-banner bg--cover" data-background="img/bg/home-2/home-banner.jpg">
        <h1>Stock left</h1>
        
        <h1></h1>
      </div>
      <div class="ps-section ps-home-special-categories bg--cover" data-background="img/bg/home-2/special-cake.png">
      <div class="ps-breadcrumb">
      <div class="container">
          
    <?php 
      
				 	$q= "SELECT * FROM product";
					$result=$con->query($q);
					if(!$result){
						echo "Select failed. Error: ".$con->error ;
						return false;
					}
                
    ?>
    
                 <div class="ps-breadcrumb">
                 <h4> Stock Record </h4>
                </div>
                     <table font-size = "8px"; align ="center" border = "2px"; style = "width:800px; line-heigth: 80px;">
                     <style>
                table, td {
                font-size: 20px;
                }
                th{
                    font-size: 25px;
                }
                tr{
                  text-align: center;
                }
                </style>
                 <tr>
                     <th colspan = "5"></th>
                     
                </tr>
                <t>
                  <th> Product </th>
                    <th> Product ID </th>
                    <th> Name </th>
                    <th> Price </th>
                    <th> Quantity </th>
                    <th> edit </th>
                    <th> add </th>
                 </t>   
                 
                 <?php 
                 
                 while($rows=$result->fetch_array()){ ?>
<tr>
                    <td><img src=<?php echo $rows["image"] ?>  width="30" height="30"/></a></td>
                    <td><?php echo $rows['productid'] ?></td>
                    <td><?php echo $rows['productname'] ?></td>
                    <td><?php echo $rows['productprice'] ?></td>
                    <td><?php echo $rows['pquantity'] ?></td>
                    <td><a href='productstock_edit.php?productid=<?=$rows['productid']?>'><img src="img/edit-button.png" width="24" height="24"></a></td>
                    <td><a href='productstock_add.php?productid=<?=$rows['productid']?>'><img src="img/add.png" width="24" height="24"></a></td>

                </tr>
 
                <tr></tr>
                          
				<?php } ?>
                </div> 
                 </table>
                
			
            </div>
                </div>
                <div class="ps-section__header">
                <?php $count=$result->num_rows;

					echo "<tr><td colspan=7 align=right>Total $count records</td></tr>";
					$result->free();
			?>
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
