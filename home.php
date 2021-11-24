<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);
$userid = $user_data['userid'];
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- homepage-231:54-->
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
    <title>Toasty | Home</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
      <a> <p><i class="fa fa-clock-o"></i> 08:00 am - 08:30 pm   </p></a><span>  </span>
        <div class= "header__actions">
        <div class="header__left">
        <a href="user_orderhistory.php?userid=<?php echo $userid;?>">   OrderHistory </a>
        
        </div>
        </div>
      </div>
      <div class="header__center">
        <nav class="header__navigation left">
          <ul class="menu">
            <li class="current-menu-item menu-item-has-children"><a href="home.php">Home</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
          
            <li class="menu-item-has-children"><a href="shop-page-1.php">Shop</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
            
                <li class="menu-item-has-children"><a href="product-background.php">Product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
                  </ul>
                </li>
              </ul>
            </li>
          
          </ul>
        </nav>
        
        <div class="header__logo"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG"></a></div>
        <nav class="header__navigation right">
          <ul class="menu">
            <li class="current-menu-item menu-item-has-children"><a href="about-us.php">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li><a href="about-us.php">About</a>
                </li>
                <li><a href="checkout.php">Checkout</a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="blog-list.php">News</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              
            </li>
            <li><a href="contact-us.php">Contact</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="header__right">
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
    <div id="homepage-2">
      <div class="ps-home-banner bg--cover" data-background="img/bg/home-2/home-banner.jpg">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="off" data-owl-nav-left="&lt;i class='fa fa-arrow-left'&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class='fa fa-arrow-right'&gt;&lt;/i&gt;">
          <div class="ps-product--banner">
            <div class="ps-product__thumbnail"><a href="shop-page-1.php"><img src="img/banner/home-2/1.png" alt=""></a></div>
            <div class="ps-product__content">
              <h4>FEATURED PRODUCT</h4><a class="ps-product__title" href="shop-page-1.php"> Toasty Premium <br> Dark Chocolate Cake</a>
              <p>Highend - Premium - Sweet</p><a class="ps-btn" href="shop-page-1.php"> Order Now</a>
            </div>
          </div>
          <div class="ps-product--banner">
            <div class="ps-product__thumbnail"><a href="shop-page-1.php"><img src="img/banner/home-2/2.png" alt=""></a></div>
            <div class="ps-product__content">
              <h4>FEATURED PRODUCT</h4><a class="ps-product__title" href="shop-page-1.php"> Toasty Premium <br> Chocolate Truffle Berry Cake</a>
              <p>Premium - Lowfat - Tasty</p><a class="ps-btn" href="shop-page-1.php"> Order Now</a>
            </div>
          </div>
          
        </div>
      </div>
      <div class="ps-section ps-home-special-categories bg--cover" data-background="img/bg/home-2/special-cake.png">
        <div class="container">
          <div class="ps-section__header">
            <p>Main products</p>
            <h3>Recommended Menu</h3><i class="chikery-tt3"></i><small>Freashly baked everyday <br> all homemade from the oven.</small>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                <div class="ps-block--special--cake">
                  <div class="ps-block__icon"><i class="chikery-bk1"></i></div>
                  <div class="ps-block__content">
                    <h4><a href="shop-page-1.php">Bread Cakes</a></h4>
                    <p>Our bread cakes offer a very soft texture that blends well with the fully proofed bread.</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                <div class="ps-block--special--cake">
                  <div class="ps-block__icon"><i class="chikery-bk2"></i></div>
                  <div class="ps-block__content">
                    <h4><a href="shop-page-1.php">Croissants</a></h4>
                    <p>Traditional French croissants prepared over three days.</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                <div class="ps-block--special--cake">
                  <div class="ps-block__icon"><i class="chikery-bk5"></i></div>
                  <div class="ps-block__content">
                    <h4><a href="shop-page-1.php">Muffins</a></h4>
                    <p>Made to order muffins upon a special request.</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 ">
                <div class="ps-block--special--cake">
                  <div class="ps-block__icon"><i class="chikery-bk4"></i></div>
                  <div class="ps-block__content">
                    <h4><a href="shop-page-1.php">Cookies</a></h4>
                    <p>Our cookies are soft and chewy making it a tasty after-dinner treats or morning coffee dunkers.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ps-section__footer text-center"><a class="ps-btn ps-btn--outline" href="shop-page-1.php">All Products</a></div>
        </div>
      </div>
      <div class="ps-section ps-home-about bg--cover" data-background="img/bg/home-about.jpg">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
              <div class="ps-section__image"><img src="img/homepage/home-1/home-about.png" alt=""></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
              <div class="ps-section__content">
                <p>“ Toasty was created for us to share our traditional homemade recipes for our customers to try our original taste. ”</p>
                <div class="ps-section__image"><img src="img/homepage/home-1/signature1.PNG" width="200" height="100" alt=""></div>
                <h5><span>Toasty</span> - CEOs Toasty</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-awards bg--cover" data-background="img/bg/home-2/home-award.jpg">
        <div class="container">
          <div class="ps-section__header">
            <p>Toaty Bakery Shop</p>
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
      <div class="ps-section ps-home-product">
        <div class="container">
          <div class="ps-section__header">
            <p>Our Special Menu</p>
            <h3>Bread of the Day</h3><i class="chikery-tt3"></i>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/23.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a><span class="ps-badge ps-badge--sale"><i>30%</i></span>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Pain Simit</a>
                      <p><span>250g</span><span>3 pieces/pack</span></p><span class="ps-product__price sale"><del>250.00 THB</del> 175.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href='temp.php?action=add&productid=14'>Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/39.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a><span class="ps-badge ps-badge--sale"><i>30%</i></span>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Toasty Original Cracker</a>
                      <p><span>300g</span><span>30 pieces/pack</span></p><span class="ps-product__price sale"><del>150.00 THB</del> 105.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href='temp.php?action=add&productid=15'>Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/24.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Premium Butter Croissant</a>
                      <p><span>60g</span><span>1 piece</span></p><span class="ps-product__price">80.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="'temp.php?action=add&productid=19'">Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/38.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Original Pretzel</a>
                      <p><span>130g</span><span>1 piece</span></p><span class="ps-product__price">60.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href='temp.php?action=add&productid=17'>Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/41.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a><span class="ps-badge ps-badge--new"><i>New</i></span>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Panini Bread</a>
                      <p><span>575g</span><span>5 pieces/pack</span></p><span class="ps-product__price">250.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href='temp.php?action=add&productid=18'>Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 ">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="img/product/22.png" alt=""/><a class="ps-product__overlay" href="shop-page-1.php"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="shop-page-1.php">Premium Chocolate Croissant</a>
                      <p><span>70g</span><span>1 piece</span</p><span class="ps-product__price">100.00 THB</span>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href='temp.php?action=add&productid=16'>Add to cart</a>
                      <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="ps-section ps-home-blog">
        <div class="container">
          <div class="ps-section__header">
            <p>Blog & News</p>
            <h3>From Our Archive</h3><i class="chikery-tt3"></i>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-post">
                  <div class="ps-post__thumbnail"><img src="img/blog/home-blog-1.jpg" alt=""><a class="ps-post__overlay" href="blog-list.php"></a></div>
                  <div class="ps-post__content">
                    <p class="ps-post__meta">October 3, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-list.php">The New and Improved Premium Butter Croissant</a><a class="ps-post__morelink" href="blog-list.php">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-post">
                  <div class="ps-post__thumbnail"><img src="img/blog/home-blog-2.jpg" alt=""><a class="ps-post__overlay" href="blog-list.php"></a></div>
                  <div class="ps-post__content">
                    <p class="ps-post__meta">October 1, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-list.php">New Menu: Raisin Bread</a><a class="ps-post__morelink" href="blog-list.php">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-post">
                  <div class="ps-post__thumbnail"><img src="img/blog/home-blog-3.jpg" alt=""><a class="ps-post__overlay" href="blog-list.php"></a></div>
                  <div class="ps-post__content">
                    <p class="ps-post__meta">September 2, 2021  by<a href="#"> Admin</a></p><a class="ps-post__title" href="blog-list.php">The Best Panini Bread Sandwich</a><a class="ps-post__morelink" href="blog-list.php">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ps-section__footer"><a class="ps-btn ps-btn--outline" href="blog-list.php ">View More</a></div>
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
            <div class="ps-site-info"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG"width="200" 
              height="200" alt=""></a>
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
    </footer>
    <div class="ps-popup" id="subscribe" data-time="500">
      <div class="ps-popup__content bg--cover" data-background="img/bg/subcribe.jpg"><a class="ps-popup__close ps-btn--close" href="#"></a>
        <form class="ps-form--subscribe-popup" action="#" method="get">
          <div class="ps-form__content">
            <h5>Welcome back,</h5>
            <h3><?php echo $user_data['fname'];?></h3>
            <p>Thank you for coming back :)</p>
            
           
            </div>
          </div>
        </form>
      </div>
    </div>
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
