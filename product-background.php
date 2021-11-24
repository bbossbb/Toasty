<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $user_data['userid'];

?>

<!DOCTYPE html>
<html lang="en">
  
<!-- product-background37:32-->
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
    <title>Toasty | Product</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
        <div class="header__logo"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG"  alt=""></a></div>
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
   
 
    <!--include search-sidebar-->
    <div class="ps-page ps-page--product-detail">
      <div class="ps-product--detail ps-product--background bg--cover" data-background="img/hero/shop-hero.png">
        <div class="container">
          <div class="ps-product__header">
            <div class="ps-product__thumbnail" data-vertical="false">
              <figure>
                <div class="ps-wrapper"><span class="ps-badge ps-badge--sale"><i>30%</i></span>
                  <div class="ps-product__gallery" data-arrow="true">
                    <div class="item"><a href="img/product/25.png"><img src="img/product/25.png" alt=""></a></div>
                    <div class="item"><a href="img/product/26.png"><img src="img/product/26.png" alt=""></a></div>
                    <div class="item"><a href="img/product/37.png"><img src="img/product/37.png" alt=""></a></div>
                  </div>
                </div>
              </figure>
              <div class="ps-product__variants" data-item="5" data-md="4" data-sm="4" data-arrow="false">
                <div class="item"><img src="img/product/25.png" alt=""></div>
                <div class="item"><img src="img/product/26.png" alt=""></div>
                <div class="item"><img src="img/product/37.png" alt=""></div>
              </div>
            </div>
            <div class="ps-product__info">
              <div class="ps-breadcrumb">
                <ul class="breadcrumb">
                  <li><a href="home.php">Home</a></li>
                  <li>Product Details</li>
                </ul>
              </div>
              <h1>Donut Cake</h1>
              <div class="ps-product__meta">
                <div class="ps-product__rating">
                  <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
              </div>
              <h4 class="ps-product__price sale">
                <del> 50.00 THB</del> 35.00 THB / 1 piece
              </h4>
              <div class="ps-product__desc">
                <p>Our donut cake is coated with white cream cheese icing, topped with shreded cheese and sprinkled with chilli flakes.</p>
               
              </div>
              <div class="ps-product__specification">
                <p><strong>Expire Date:</strong> 3 days after delivery</p>
                <p><strong>AVAILABILITY:</strong>In Stock</p>
              </div>
              <div class="ps-product__shopping">
                
                <div class="form-group--number">
                  
                </div><a class="ps-btn" href="shop-page-1.php">Order now</a>
                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
              </div>
              <div class="ps-product__sharing">
                <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                <p>Share This:<a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail ps-product--background">
        <div class="container">
          <div class="ps-product__content ps-tab-root">
            <ul class="ps-tab-list">
              <li class="active"><a href="#tab-1">Description</a></li>
              <li><a href="#tab-2">Reviews</a></li>
              <li><a href="#tab-3">Addtional info</a></li>
            </ul>
            <div class="ps-tabs">
              <div class="ps-tab active" id="tab-1">
                <div class="ps-document">
                  <h5>INGREDIENTS:</h5>
                  <p>Cake Flour, Purpose Flour, Cream Cheese, Icing Powder, Shreded Cheese, Chilli Flakes</p>
                  <h5>PREPARATION:</h5>
                  <p>These are the steps customers should take into consideration when you have received your orders.</p>
                  <p>When customers receive their orders, we advice you to keep the bakes in the fridge if you will be saving it for later. Depend of certain menu, reheat you bakes at 200 degrees celcius for 1-2 minutes.</p>
                </div>
              </div>
              <div class="ps-tab" id="tab-2">
                <div class="ps-reviews">
                  <div class="ps-block--review">
                    <div class="ps-block__thumbnail"><img src="img/users/review/1.jpg" alt=""></div>
                    <div class="ps-block__content">
                      <figure>
                        <figcaption>By <strong> Kanokkarn P.</strong> <span> 02/02/2021</span></figcaption>
                        <select class="ps-rating" data-read-only="true">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                          <option value="2">5</option>
                        </select>
                      </figure>
                      <p>The Best Bakery Online Shopping in The world !!</p>
                    </div>
                  </div>
                  <div class="ps-block--review">
                    <div class="ps-block__thumbnail"><img src="img/users/review/2.jpg" alt=""></div>
                    <div class="ps-block__content">
                      <figure>
                        <figcaption>By <strong> Crongchatra S.</strong> <span> 22/04/2021</span></figcaption>
                        <select class="ps-rating" data-read-only="true">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                          <option value="2">5</option>
                        </select>
                      </figure>
                      <p>Fast Delivery, Good packing , Very Statisfied :)</p>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="ps-tab" id="tab-3">
                <p>For More Additional Information</p><a href = contact-us.php><p> Please Contact Us :)</p></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-related-product">
        <div class="container">
          <div class="ps-section__header">
            <p>You may also like</p>
            <h3>Related Products</h3><i class="chikery-tt3"></i>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/17.png" alt=""/><a class="ps-product__overlay" href="shop-page-2.php"></a><span class="ps-badge ps-badge--sale"><i>30%</i></span>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Chocolate Raspberry Croissant</a>
                      <p><span>55g</span><span>1 piece</span></p><span class="ps-product__price sale"><del>120.00 THB</del> 84.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href = 'temp.php?action=add&productid=<?php echo '22'?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/31.png" alt=""/><a class="ps-product__overlay" href="shop-page-2.php"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Chocolate Crepe Cake</a>
                      <p><span>120g</span><span>1 piece</span></p><span class="ps-product__price">120.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href = 'temp.php?action=add&productid=<?php echo '21'?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/13.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a><span class="ps-badge ps-badge--new"><i>New</i></span>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Brownie Chocolate Cake</a>
                      <p><span>120g</span><span>1 piece</span></p><span class="ps-product__price">100.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href = 'temp.php?action=add&productid=<?php echo '13'?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/12.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Chocolate Cake</a>
                      <p><span>1 pound</span></p><span class="ps-product__price">800.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href = 'temp.php?action=add&productid=<?php echo '12'?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ps-section__footer"><a class="ps-btn ps-btn--outline" href="shop-page-1.php"> All products</a></div>
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

<!-- product-background37:32-->
</html>