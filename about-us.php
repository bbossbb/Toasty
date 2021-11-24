<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $user_data['userid'];

?>

<!DOCTYPE html>
<html lang="en">
  
<!-- about-us31:03-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/fav-icon.PNG" type="image/x-icon" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Toasty | About us</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
    <header class="header header--default header--home-4 line" data-sticky="true">
      <div class="header__left">
        <ul class="ps-list--social">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <div class= "header__actions">
        <div class="header__left">
        <a href="user_orderhistory.php?userid=<?php echo $userid;?>">   OrderHistory </a>
      </div>
      </div>
      </div>
      <div class="header__center">
        <nav class="header__navigation left">
          <ul class="menu">
            <li class="menu-item-has-children"><a href="home.php">Home</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
      
            <li class="menu-item-has-children"><a href="shop-page-1.php">Shop</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
               
              
              <li class="menu-item-has-children"><a href="product-background.php">Product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
            </li>
          </ul>
        </nav>
        <div class="header__logo"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG" alt=""></a></div>
        <nav class="header__navigation right">
          <ul class="menu">
            <li class="menu-item-has-children"><a href="about-us.php">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li class="current-menu-item "><a href="about-us.php">About</a>
                </li>
                <li class="current-menu-item "><a href="checkout.php">Checkout</a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="blog-list.php">News</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            <li class="current-menu-item "><a href="contact-us.php">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
      <?php
      $userid = $_SESSION['userid'];
      ?>
      <?php
                $query1 = "SELECT * FROM product,cart WHERE userid = $userid AND product.productid = cart.productid";
                 $result1 = mysqli_query($con,$query1);

                
                 
        ?>
        <?php 
        $count=$result1->num_rows; 
        ?>
    
      <div class="header__right">
      
     
        <!--Logout Button--><div class="header__actions"><a method = 'post' input type = 'submit ' value="logout" href="logout.php">  logout </a><a href="user_customeredit.php?userid=<?php echo $userid;?>">Profile</a><a class="ps-search-btn" href="#"><i class="fa fa-search"></i></a><a href="#"><i class="fa fa-heart-o"></i></a>
          <div class="ps-cart--mini"><a class="ps-cart__toggle" href="#"><i class="fa fa-shopping-basket"></i><span><i><?php printf($count)?></i></span></a>
            <div class="ps-cart__content">
              <div class="ps-cart__items">
                
                 

        <?php
        $totalprice = 0;
        if(mysqli_num_rows($result1) > 0){
            while($row=$result1->fetch_array()){
              
        ?>
        <div class="ps-product--mini-cart">
                  <div class="ps-product__thumbnail"><img src=<?php echo $row["image"] ?> alt=""/></a></div>
                  <div class="ps-product__content"><a class="ps-product__title" href="#"><?php echo $row["productname"] ?></a><a class = "ps-btn--close" method = 'post' input type ='submit' value="delete" href="delete_cart.php?productid=<?php echo $row['productid']?>"></a>
                  <p><strong>quantity : <?php echo $row["quantity"]?></strong></p>
                  <?php
                  $quantity = intval($row['quantity']);
                  $price = floatval($row['productprice']);
                  ?> 
                    <p class="ps-product__price"><?php echo $quantity*$price?> THB</p>
                    </div>
                </div>

             <?php
            }
        }
        
        ?>
        
        </div>
        <?php
        $query2 = "SELECT SUM(price) as sum FROM cart WHERE userid = $userid";
        $result2 = mysqli_query($con,$query2);
        while ($row = $result2->fetch_assoc()) {
          if (empty($row['sum'])){
          $row['sum'] = '0';
        }

              
        ?>
        <div class="ps-cart__footer">
            <h3>Sub Total:<strong><?php echo $row['sum']; ?> THB</strong></h3>
            <figure><a class="ps-btn" href="shopping-cart.php">View Cart</a><a class="ps-btn ps-btn--dark" href="checkout.php">Checkout</a></figure>
              </div>
            </div>
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    </header>
   
   
    <div class="navigation--list">
      <div class="navigation__content"><a class="navigation__item active" href="home.php"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div class="ps-page--about">
      <div class="ps-hero bg--cover" data-background="img/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="home.php">Home</a></li>
              <li>About Us</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">About Us</h1>
        </div>
      </div>
      <div class="ps-section ps-home-awards bg--cover" data-background="img/bg/home-2/home-award.jpg">
        <div class="container">
          <div class="ps-section__header">
            <p>Toasty Bakery Shop</p>
            <h3>Our Awards</h3><i class="chikery-tt3"></i>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-block--award">
                  <div class="ps-block__header"><img src="img/awards/1.png" alt="">
                    <h4>BAKERY OF THE YEAR</h4>
                    <p>2021</p>
                  </div>
                  <div class="ps-block__content">
                    <p>The best selling bakery in Khlong Luang District.</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-block--award">
                  <div class="ps-block__header"><img src="img/awards/2.png" alt="">
                    <h4>MUFFINS SHOP OF THE YEAR</h4>
                    <p>2021</p>
                  </div>
                  <div class="ps-block__content">
                    <p>Best scored muffins in South-East Asia.</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-block--award">
                  <div class="ps-block__header"><img src="img/awards/3.png" alt="">
                    <h4>Awards Bakery Academy</h4>
                    <p>2021</p>
                  </div>
                  <div class="ps-block__content">
                    <p>Award winning bakery of SIIT Chef Acamdemy, the best bakery academy in Thailand.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-about">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
              <div class="ps-section__header">
                <p>WELCOME TO Toasty</p>
                <h3>Toasty History</h3><i class="chikery-tt1"></i>
              </div>
              <div class="ps-section__content">
                <p>“ Toasty was created for us to share our traditional homemade recipes for our customers to try our original taste. ”</p>
                <div class="ps-section__image"><img src="img/homepage/home-1/signature1.PNG" width="200" height="100" alt=""></div>
                <h5><span>Toasty</span> - Ceos</h5>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
              <div class="ps-section__image"><img src="img/homepage/home-3/home-about.png" alt=""></div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-best-services">
        <div class="ps-section__left bg--cover" data-background="img/bg/home-1/home-best-services.jpg"></div>
        <div class="ps-section__right">
          <div class="ps-section__container">
            <div class="ps-section__header">
              <p>Toasty CAKE</p>
              <h3>Best Services</h3><i class="chikery-tt3"></i>
            </div>
            <div class="ps-section__content">
              <p>Toasty tries our best to provide a memorable services for all our customers!</p>
              <ul>
                <li>BEST QUALITY</li>
                <li>FAST DELIVERED</li>
                <li>Event Cakes</li>
                <li>INGREDIENT SUPPLY</li>
                <li>ONLINE BOOKING</li>
              </ul>
            </div>
          </div>
          <div class="ps-section__image bg--cover" data-background="img/bg/home-1/home-best-services-2.jpg"></div>
        </div>
      </div>
      <div class="ps-section ps-home-video bg--cover" data-background="img/bg/pages/about-video.jpg">
        <div class="container">
          <div class="ps-section__header">
            <p>Video Present</p>
            <h3>Any Design <br/> For Your Feast-day</h3><a class="ps-video" href="img/video/video1.mp4"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-good-baker">
        <div class="container">
          <div class="ps-section__header">
            <p>Our baker</p>
            <h3>The Good Baker</h3><i class="chikery-tt1"></i>
          </div>
          <div class="ps-section__content">
            <div class="ps-block--good-baker">
              <div class="ps-block__left"><img src="img/homepage/home-3/good-baker.png" alt=""></div>
              <div class="ps-block__right">
                <h4>Kijwipat Thanasittichai</h4>
                <h5>Chef, Co - accfounder</h5>
                <p>My experience as pastry chef was passed down from generation to generation, and I am happy to be sharing it with all of our customers.</p>
                <div class="ps-block__images"><img src="img/users/bakers/1.png" alt=""><img src="img/users/bakers/2.png" alt=""><img src="img/users/bakers/3.png" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="ps-footer ps-footer--light">
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
            <div class="ps-site-info"><a class="ps-logo" href="index-2.html"><img src="img/logo1.PNG" width="200" height="200" alt=""></a>
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

<!-- about-us31:30-->
</html>