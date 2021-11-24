<?php 
session_start();
include('server.php');
include("functions.php");
$user_data = check_login($con);
$userid = $user_data['userid'];
?>

<!DOCTYPE html>
<html lang="en">
  
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
    <title>Toasty | Shopping</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
        $count = 0;
        while($row=$result1->fetch_array()){
        $count= $count + intval($row['quantity']);
        
        }
        ?>
    
      <div class="header__right">
      

        <!--Logout Button--><div class="header__actions"><a method = 'post' input type = 'submit ' value="logout" href="logout.php">  logout </a><a href="user_customeredit.php?userid=<?php echo $userid;?>">Profile</a><a class="ps-search-btn" href="#"><i class="fa fa-search"></i></a><a href="#"><i class="fa fa-heart-o"></i></a>
          <div class="ps-cart--mini"><a class="ps-cart__toggle" href="#"><i class="fa fa-shopping-basket"></i><span><i><?php echo $count;?></i></span></a>
            <div class="ps-cart__content">
              <div class="ps-cart__items">
                


              <?php

$query2 = "SELECT * FROM product,cart WHERE userid = $userid AND product.productid = cart.productid";
$result2 = mysqli_query($con,$query2);

$totalprice = 0;
if(mysqli_num_rows($result2) > 0){
    while($row=$result2->fetch_array()){
      
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
      <div class="navigation__content"><a class="navigation__item active" href="index-2.html"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div class="ps-hero ps-hero--shopping bg--cover" data-background="img/hero/shop-hero.png">
      <div class="ps-hero__container">
        <div class="ps-breadcrumb">
          <ul class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li>Shop Page</li>
          </ul>
        </div>
        <h1 class="ps-hero__heading">Shop Products</h1>
      </div>
    </div>
    <div class="ps-page--shop">
      <div class="container-fluid">
        <div class="ps-shopping ps-shopping--no-sidebar">
          <div class="ps-shopping__top">
            <div class="ps-shopping__top__left">
              <ul class="ps-product__categories">
                <li class="active"><a href="shop-page-1.php">Bready</a></li>
              </ul>
            </div>
            <div class="ps-shopping__top__right">
              <p>Show 22 of 22</p>
              
            </div>
          </div>
          <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($con,$query);
        ?>
        <div class="ps-product-box five-column">
        <div class="row">
        
        
        <?php
        
        if(mysqli_num_rows($result) > 0){
            while($row=$result->fetch_array()){
        ?>
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
          <div class="ps-product">
            <form method = "post" action = "temp.php?action=add&productid=<?php echo $row["productid"]?>">
                  <div class="ps-product__thumbnail"><img src=<?php echo $row["image"] ?> alt=""/><a class="ps-product__overlay" href="#"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="#"><?php echo $row["productname"] ?></a>
                    <span class="ps-product__price"><?php echo $row['productprice']?> THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href = 'temp.php?action=add&productid=<?php echo $row['productid']?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>

                    </div>
                </div>
            </form>
            </div>
            </div>
<?php
    }
}

?>            
              </div>
              </div>

          <div class="ps-pagination">
            <ul class="pagination">
              <li><a href="#"><i class="fa fa-caret-left"></i></a></li>
              <li class="active"><a href="shop-page-1.php">1</a></li>
    

              <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
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
            <div class="ps-site-info"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG" width = "200" heigth = "200"alt=""></a>
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

<!-- shop-fullwidth-no-sidebar37:32-->
</html>