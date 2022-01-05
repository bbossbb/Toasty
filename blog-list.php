<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $user_data['userid'];

?>

<!DOCTYPE html>
<html lang="en">
  
<!-- blog-list37:39-->
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
    <title>Toasty | Blog</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
             
            </li>
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
      <div class="navigation__content"><a class="navigation__item active" href="home.php"><i class="fa fa-home"></i></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="fa fa-bars"></i></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="fa fa-search"></i></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="fa fa-shopping-basket"></i></a></div>
    </div>
    <!--include search-sidebar-->
    <div class="ps-page">
      <div class="ps-hero bg--cover" data-background="img/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="home.php">Home</a></li>
              <li>Blog Grid</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">Blog & News</h1>
        </div>
      </div>
      <div class="container">
        <div class="ps-blog ps-blog--sidebar">
          <div class="ps-blog__left">
            <div class="ps-post">
              <div class="ps-post__thumbnail"><img src="img/blog/blog-list/1.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
              <div class="ps-post__content">
                <p class="ps-post__meta">October 1, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">New Menu: Raisin Bread</a>
                <p>Toasty has created a new menu for all our raisin lovers with the new raisin bread that are freshly made everyday!</p><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
              </div>
            </div>
            <div class="ps-post">
              <div class="ps-post__thumbnail"><img src="img/blog/blog-list/2.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
              <div class="ps-post__content">
                <p class="ps-post__meta">August 31, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">Enjoy Our Bakes with Your Breakfast</a>
                <p>As the creators of our baked goods at Toasty, here are some tips and tricks with personal recipes of how to serve our bakes with your morning breakfast.</p><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
              </div>
            </div>
            <div class="ps-post">                                                                                                                              
              <div class="ps-post__thumbnail"><img src="img/blog/blog-list/3.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
              <div class="ps-post__content">
                <p class="ps-post__meta">August 23, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">New Pop-Up Store</a>
                <p>We are opening a new pop-up store at Central World from August 25, 2021 till September 25, 2021. Make sure to come a visit!</p><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
              </div>
            </div>
            <div class="ps-post">
              <div class="ps-post__thumbnail"><img src="img/blog/blog-list/4.jpg" alt=""><a class="ps-post__overlay" href="blog-detail.html"></a></div>
              <div class="ps-post__content">
                <p class="ps-post__meta">March 1, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-detail.html">The Sharing Platter</a>
                <p>Inspired by Greek sharing feasts, this sharing platter is made to bring people together with delicious food. Display tapas, sweet treats and more with this beautifully crafted Garden Trading ceramic tray. With a soft neutral glaze and varying bubbles, this unique piece adds rustic charm to your dining set up</p><a class="ps-post__morelink" href="blog-detail.html">Read More</a>
              </div>
            </div>
            <div class="ps-blog__footer"><a class="ps-btn ps-btn--outline" href="#"> LOAD MORE</a></div>
          </div>
          <div class="ps-blog__right">
            <aside class="widget widget_search">
              <form class="ps-form--widget-search" action="#" method="post">
                <input class="form-control" type="text" placeholder="Search Anything">
                <button><i class="fa fa-search"></i></button>
              </form>
            </aside>
            <aside class="widget widget_blog widget_blog-categories">
              <h3 class="widget-title">Categories</h3>
              <ul class="ps-list--arrow">
                <li><a href="#">Living interior</a></li>
                <li><a href="#">Architecture</a></li>
                <li><a href="#">Life style</a></li>
                <li><a href="#">Magazine furniture</a></li>
                <li><a href="#">Bedroom Style</a></li>
              </ul>
            </aside>
            <aside class="widget widget_blog widget_recent-posts">
              <h3 class="widget-title">RECENT POST</h3>
              <div class="ps-post--sidebar">
                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-list.php"></a><img src="img/blog/blog-sidebar/1.jpg" alt=""></div>
                <div class="ps-post__content"><a class="ps-post__title" href="blog-list.php">New Menu: Raisin Bread</a>
                  <p>By<a href="#"> Admin</a></p>
                </div>
              </div>
              <div class="ps-post--sidebar">
                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-list.php"></a><img src="img/blog/blog-sidebar/2.jpg" alt=""></div>
                <div class="ps-post__content"><a class="ps-post__title" href="blog-list.php">Enjoy Our Bakes with Your Breakfast</a>
                  <p>By<a href="#"> Admin</a></p>
                </div>
              </div>
              <div class="ps-post--sidebar">
                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-list.php"></a><img src="img/blog/blog-sidebar/3.jpg" alt=""></div>
                <div class="ps-post__content"><a class="ps-post__title" href="blog-list.php">New Pop-Up Store</a>
                  <p>By<a href="#"> Admin</a></p>
                </div>
              </div>
              <div class="ps-post--sidebar">
                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-list.php"></a><img src="img/blog/blog-sidebar/4.jpg" alt=""></div>
                <div class="ps-post__content"><a class="ps-post__title" href="blog-list.php">The Sharing Platter</a>
                  <p>By<a href="#"> Admin</a></p>
                </div>
              </div>
            </aside>
            <aside class="widget widget_blog widget_tags">
              <h3 class="widget-title"> Tags</h3><a href="#">Branding</a><a href="#">Interior</a><a href="#">Bakery</a><a href="#">Creative</a><a href="#">Furniture</a><a href="#">Home</a><a href="#">Living room</a><a href="#">Life Style</a><a href="#">Socola</a><a href="#">Artchitecture</a><a href="#">Sofas</a><a href="#">chikery</a>
            </aside>
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
            <div class="ps-site-info"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG" width = "200" height = " 200" alt=""></a>
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

<!-- blog-list38:23-->
</html>