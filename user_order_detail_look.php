<?php

session_start();
include("server.php");
include("functions.php");
$user_data = check_login($con);

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
    <title>Toasty | Order History</title><link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&amp;display=swap" rel="stylesheet">
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
        <h1>ORDER DETAIL</h1>
        
        <h1></h1>


      </div>
      <div class="ps-section ps-home-special-categories bg--cover" data-background="img/bg/home-2/special-cake.png">
      <div class="ps-breadcrumb">
      <div class="container">
          
    <?php 
      $orderid = $_GET['orderid'];
      $q="SELECT * FROM order_product_detail where orderid = '$orderid'" ;
					$result=$con->query($q);
					if(!$result){
						echo "Select failed. Error: ".$con->error ;
						return false;
					}
                
    ?>
    
                 <div class="ps-breadcrumb">
                 <h4> Order Detail </h4>
                </div>
                     <table font-size = "8px"; align ="center" border = "2px"; style = "width:1000px; line-heigth: 80px;">
                     <style>
                td {
                font-size: 20px;
                align-items: center;
                }
                th{
                    font-size: 25px;
                }
                tr{
                  text-align: center;
                }
                </style>
                 <tr>
                     <th colspan = "6"></th>
                     
                </tr>
                <t>
                    <th> Order ID </th>
                    <th> Name </th>
                    <th> Quantity </th>
                    <th> Price </th>

                 </t> 
                 <?php 
                 while($rows=$result->fetch_array()){ ?>

                <tr>
                    <td><?=$rows['orderid'] ?></td>
                    <td><?= $rows['productname'] ?></td>
                    <td><?= $rows['pquantity'] ?></td>
                    <td><?=$rows['productprice'] ?></td>
                    
    
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
                <div class="ps-breadcrumb">
                    
                <a href="user_orderhistory.php?userid=<?php echo $userid;?>">
  <button class='ps-btn ps-product__add-to-cart' >Back</button>
</a>
                
            </div>
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
            <div class="ps-site-info"><a class="ps-logo" href="home.php"><img src="img/logo1.PNG"width="200" 
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
