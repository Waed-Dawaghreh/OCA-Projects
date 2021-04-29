<?php
session_start();
require_once("php/connection.php");
?> 

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Agent</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/timedropper.css">
    <link rel="stylesheet" href="css/datedropper.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages int_dark_bg agents homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
          <header id="header-container">
            <!-- Header -->
              <header id="header-container">
            <!-- Header -->
            <div id="header" class="int_content_wraapper hd">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.php"><img src="images/logo-white-1.svg" data-sticky-logo="images/logo-red.svg" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 black">
                            <ul id="responsive">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li><a href="agencies.php">Agencies</a>
                                </li>
                                <li><a href="properties.php">Properties Finder</a>
                                </li>
                                <li><a href="about.php">About Us</a>
                                </li>
                                <li><a href="contact-us.php">Contact</a></li>
                                 <?php if (!isset($_SESSION['auth'])) 
                                 { echo "  
                                <li class='d-none d-xl-none d-block d-lg-block'><a href='login.php'>Login</a></li> 
                                <li class='d-none d-xl-none d-block d-lg-block'><a href='register.php'>Register</a></li> "; } ?>
                                <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a href="add-property.php" class="button border btn-lg btn-block text-center">Add Listing<i class="fas fa-laptop-house ml-2"></i></a></li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <a href="add-property.php" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->
                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span><img src="php/uploads/<?php echo $_SESSION['image']; ?>" alt=""></span><?php if (isset($_SESSION['auth'])) { echo $_SESSION['username']; } else { echo "Guest";} ?>
                        </div>
                        <?php if (isset( $_SESSION['auth'])) { echo "  
                             <ul>
                              <li><a href='dashboard.php'> Dashboard</a></li>
                            <li><a href='user-profile.php'> Edit profile</a></li>
                            <li><a href='add-property.php'> Add Property</a></li>
                            <li><a href='change-password.php'> Change Password</a></li>
                            <li><a href='php/logout.php?logout'>Log Out</a></li>
                        </ul>
                        " ; 
                         } else { echo "  <ul>
                            <li><a href='login.php'> Log In First</a></li> </ul>";} ?>
                      
                    </div>
                    <!-- Right Side Content / End -->

                
                    <!-- Right Side Content / End -->
                    <!-- lang-wrap-->
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->
        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
  <?php 
  function inject_checker ($conn, $field){
    return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));}
                  $agent = inject_checker($conn, $_GET['user']);
                  $query="SELECT * FROM agents WHERE user_id=$agent ";
                  $result = mysqli_query($conn,$query);
                   while($row = mysqli_fetch_array($result)) {
                       $agent_name = $row['user_name'];
                       $agent_phone = $row['user_phone'];
                       $agent_address = $row['user_address'];
                       $agent_email = $row['user_email'];
                       $agent_image = $row['user_image'];
                   }
     $sql="SELECT COUNT(property_id) AS total From property WHERE user_id = $agent"; 
     $r= mysqli_query($conn,$sql); 
     $t= mysqli_fetch_assoc($r);
     $agent_lists= $t['total']; 

   ?>
        <!-- START SECTION AGENTS DETAILS -->
        <section class="blog blog-section portfolio single-proper details mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <section class="headings-2 pt-0 hee">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <div class="text-heading text-left">
                                                    <p><a href="index.html">Home </a> &nbsp;/&nbsp; <span>Agent</span></p>
                                                </div>
                                                <h3><?php echo $agent_name; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="news-item news-item-sm">
                                    <a class="news-img-link">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured"><?php echo $agent_lists;?> Listings</div>
                                            <img class="resp-img" src="php/uploads/<?php echo $agent_image; ?>" alt="blog image">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a>
                                            <h3><?php echo $agent_name; ?></h3>
                                        </a>
                                        <div class="the-agents">
                                            <ul class="the-agents-details">
                                                <li><a href="tel:<?php echo $agent_phone; ?>">Office: <?php echo $agent_phone; ?></a></li>
                                                <li><a href="#">Address: <?php echo $agent_address; ?></a></li>
                                                <li><a href="mailto:<?php echo $agent_email; ?>">Email: <?php echo $agent_email; ?></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-pots py-0">
                         
                            <!-- START SIMILAR PROPERTIES -->
                            <section class="similar-property featured portfolio bshd p-0 bg-white">
                                <div class="container">
                                    <h5>Listing By <?php echo $agent_name; ?></h5>
                                    <div class="row">
                                        <?php 
                                    $query = "SELECT * FROM property WHERE user_id='$agent' AND active='1'";
                                    $run_query = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($run_query)) {
                $image_id = $row['image_identifier']; 
                $city_id = $row['city_id'];
                $u_id = $row['user_id'];
                $sql="SELECT image_name AS image From property_images WHERE image_identifier  = $image_id LIMIT 1"; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $image_id = $t['image']; 
                $sql="SELECT city_name AS city From city WHERE city_id  = $city_id LIMIT 1"; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $city = $t['city']; 
                 $sql="SELECT user_name AS user From user WHERE user_id  = $u_id LIMIT 1"; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $u_id = $t['user'];                                 
        echo '
                                    <div class="item col-lg-6 col-md-6 col-xs-12 people landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="single-property.php?property='.$row['property_id'].'">View Property</a><span class="category">'.$row['property_type'].'</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property.php?property='.$row['property_id'].'" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For '.$row['property_status'].'</div>
                                                <div class="homes-price">'.$city.'</div>
                                                <img src="php/uploads/'.$image_id.'" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property.php?property='.$row['property_id'].'">'.$row['property_name'].'</a></h3>
                                        <p class="homes-address mb-3">
                                                <i class="fa fa-map-marker"></i><span>'.$row['address'].'</span>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>'.$row['property_bedrooms'].' Beds</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>'.$row['property_bathrooms'].' Baths</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>'.$row['property_area_size'].' sq</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-time" aria-hidden="true"></i>
                                                <span>'.$row['building_age'].' Yr/s</span>
                                            </li>
                                        </ul>
                                        <!-- Price -->
                                        <div class="price-properties">
                                            <h3 class="title mt-3">
                                                <a href="single-property.php?property='.$row['property_id'].'">$ '.$row['property_price'].'</a>
                                            </h3>
                                        </div>
                                        <div class="footer">
                                            <a href="agencies-details.php?id='.$row['user_id'].'">
                                                <i class="fa fa-user"></i> '.$u_id.'
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

        ' ; }
                                        ?>
                                    </div>
                                </div>
                            </section>
                            <!-- END SIMILAR PROPERTIES -->
                            <!-- Star Reviews -->
                            <!-- End Reviews -->
                            <!-- Star Add Review -->
                            <!-- End Add Review -->
                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="main-search-field-2">
                                    <!-- Start: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="images/single-property/banner.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <!-- End: Specials offer -->
                                    <!-- Start: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="images/single-property/banner.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <!-- End: Specials offer -->
                                    <!-- Start: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="images/single-property/banner.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <!-- End: Specials offer -->
                                    <!-- Start: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="images/single-property/banner.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <!-- End: Specials offer -->
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS DETAILS -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index.html" class="logo">
                                    <img src="images/logo-footer.svg" alt="netcom">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">95 South Park Avenue, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+456 875 369 208</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@findhouses.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Navigation</h3>
                                <div class="nav-footer">
                                    <ul>
                                        <li><a href="index.html">Home One</a></li>
                                        <li><a href="properties-right-sidebar.html">Properties Right</a></li>
                                        <li><a href="properties-full-list.html">Properties List</a></li>
                                        <li><a href="properties-details.html">Property Details</a></li>
                                        <li class="no-mgb"><a href="agents-listing-grid.html">Agents Listing</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="agent-details.html">Agents Details</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h3>Twitter Feeds</h3>
                                <div class="twitter-widget contuct">
                                    <div class="twitter-area">
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <div class="soc-log fl-wrap">
                        <p>Login</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>Or</span></div>
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1">Login</a></li>
                            <li><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username or Email Address * </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password * </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Remember me</label>
                                        </div>
                                    </form>
                                    <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                            <label>First Name * </label>
                                            <input name="name" type="text" onClick="this.select()" value="">
                                            <label>Second Name *</label>
                                            <input name="name2" type="text" onClick="this.select()" value="">
                                            <label>Email Address *</label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label>Password *</label>
                                            <input name="password" type="password" onClick="this.select()" value="">
                                            <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/timedropper.js"></script>
        <script src="js/datedropper.js"></script>
        <script src="js/inner.js"></script>

        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();
        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>