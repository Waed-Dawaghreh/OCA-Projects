<?php
require_once('php/connection.php');
session_start(); 
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Dream Home </title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="revolution/css/settings.css">
    <link rel="stylesheet" href="revolution/css/layers.css">
    <link rel="stylesheet" href="revolution/css/navigation.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
<style> 
.listing-img-container {
    height:300px !important;
    background-color: #000 !important;
}
.listing-img-container img {
    height:300px !important;
}

.team-pro img {
    height:300px !important;
}
</style>
</head>

<body class="int_dark_bg h20">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
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
        <!-- STAR HEADER SEARCH -->
        <div id="map-container" class="fullwidth-home-map dark-overlay">
            <!-- Video -->
            <div class="video-container">
                <video poster="images/bg/video-poster2.png" loop autoplay muted>
                    <source src="video/5.mp4" type="video/mp4">
                </video>
            </div>
            <div id="hero-area" class="main-search-inner search-2 vid">
                <div class="container vid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-inner2">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h1 class="mb-2"><span>Find Your Dream</span> Home</h1>
                                    <p class="mb-0">We Have The Best Properties For You.</p>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->
                                <div class="trip-search vid">

                                    <form class="form" method="get" action="properties.php">
                                        <!-- Form Location -->
                                        <div class="form-group location">
                                            <select  name="location"  class="nice-select form-control wide" tabindex="0">
                                                        <option value=""   class="option selected " > Any Location</option>
                                                    <option value="1" class="option selected ">Irbid</option>
                                                    <option value="2" class="option selected ">Aqaba</option>
                                                    <option value="3" class="option selected ">Maan</option>
                                                    <option value="4" class="option selected ">Tafilah</option>
                                                    <option value="5" class="option selected ">Karak</option>
                                                    <option value="6" class="option selected ">Madaba</option>
                                                    <option value="7" class="option selected ">Zarqa</option>
                                                    <option value="8" class="option selected ">Amman</option>
                                                    <option value="9" class="option selected ">Balqa</option>
                                                    <option value="10" class="option selected ">Mafraq</option>
                                                    <option value="11" class="option selected ">Jerash</option>
                                                    <option value="12" class="option selected ">Ajloun</option>
                                            </select>
                                        </div>
                                        <!--/ End Form Location -->
                                        <!-- Form Property Type -->
                                        <div class="form-group">
                                                <select name="type"  class="nice-select form-control wide" tabindex="0">
                                                    <option value=""   class="option selected"> Any Type</option>
                                                    <option value="Family House" class="option selected ">Family House</option>
                                                    <option value="Apartment" class="option selected ">Apartment</option>
                                            </select>
                                        </div>
                                        <!--/ End Form Property Type -->
                                        <!-- Form Property Status -->
                                          <div class="form-group duration">
                                                <select name="status"  class="nice-select form-control wide" tabindex="0">
                                                    <option value=""   class="option selected"> Any status</option>
                                                    <option value="rent" class="option selected ">For Rent</option>
                                                    <option value="sale" class="option selected ">For Sale</option>
                                            </select>
                                        </div>
                                        <!--/ End Form Property Status -->
                                        <!-- Form Bedrooms -->
                                         <div class="form-group ">
                                                <select name="bedrooms"  class="nice-select form-control wide" tabindex="0">
                                                    <option value=""   class="option selected"> Any Bedrooms</option>
                                                    <option value="1" class="option selected ">1</option>
                                                    <option value="2" class="option selected ">2</option>
                                                    <option value="3" class="option selected ">3</option>
                                                    <option value="4" class="option selected ">4</option>
                                                    <option value="5" class="option selected ">5</option>
                                                    <option value="6" class="option selected ">6</option>
                                                    <option value="7" class="option selected ">7</option>
                                                    <option value="8" class="option selected ">8</option>
                                                    <option value="9" class="option selected ">9</option>
                                                    <option value="10" class="option selected ">10</option>
                                            </select>
                                        </div>
                                        <!--/ End Form Bedrooms -->
                                        <!-- Form Bathrooms -->
                                         <div class="form-group ">
                                                <select name="bathrooms"  class="nice-select form-control wide" tabindex="0">
                                                    <option value=""   class="option selected"> Any Bathrooms</option>
                                                    <option value="1" class="option selected ">1</option>
                                                    <option value="2" class="option selected ">2</option>
                                                    <option value="3" class="option selected ">3</option>
                                                    <option value="4" class="option selected ">4</option>
                                                    <option value="5" class="option selected ">5</option>
                                                    <option value="6" class="option selected ">6</option>
                                                    <option value="7" class="option selected ">7</option>
                                                    <option value="8" class="option selected ">8</option>
                                                    <option value="9" class="option selected ">9</option>
                                                    <option value="10" class="option selected ">10</option>
                                            </select>
                                        </div>
                                        <!--/ End Form Bathrooms -->
                                        <!-- Form Button -->
                                        <div class="form-group button">
                                            <button type="submit" name='search' class="btn">Search</button>
                                        </div>
                                        <!--/ End Form Button -->
                                    </form>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER SEARCH -->

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio bg-black-1">
            <div class="container">
                <div class="row">
                    <div class="section-title col-md-5">
                        <h3>Featured</h3>
                        <h2>Properties</h2>
                    </div>
                </div>
                <div class="row portfolio-items">
                    
                       <?php
             $query="SELECT * FROM property WHERE active = 1 LIMIT 6" ;
             $result = mysqli_query($conn,$query);
             while($row = mysqli_fetch_array($result)) {
                 $image_id = $row['image_identifier']; 
                                             $sql="SELECT image_name AS image From property_images WHERE image_identifier  = $image_id LIMIT 1"; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $image_id = $t['image']; 
                                              $sql="SELECT city_name AS city From city WHERE city_id  = ".$row["city_id"]." "; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $city = $t['city']; 
                           echo '    
                                      <div class="item col-lg-4 col-md-6 col-xs-12 landscapes '.$row["property_status"].'">
                        <div class="project-single">
                            <div class="listing-item compact">
                                <a href="single-property.php?property='.$row["property_id"].'" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">$ '.$row["property_price"].'</span>
                                        <span class="'.$row["property_status"].'">For '.$row["property_status"].'</span>
                                    </div>
                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">'.$row["property_name"].' <i>'.$city.'</i></span>
                                        <ul class="listing-hidden-content">
                                            <li>Area <span>'.$row["property_area_size"].'</span></li>
                                            <li>Beds <span>'.$row["property_bedrooms"].'</span></li>
                                            <li>Baths <span>'.$row["property_bathrooms"].'</span></li>
                                            <li>City <span>'.$city.'</span></li>
                                            <li>Type <span>'.$row["property_type"].'</span></li>
                                        </ul>
                                    </div>
                                    <img  src="php/uploads/'.$image_id.'" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
            '; } ?> 
                </div>
                <div class="bg-all">
                    <a href="properties.php" class="btn btn-outline-light">View All</a>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->
        <!-- START SECTION SERVICES -->
        <!-- END SECTION SERVICES -->

        <!-- START SECTION FEATURED PROPERTIES -->

        <!-- END SECTION FEATURED PROPERTIES -->

        <!-- START SECTION AGENTS -->
        <section class="team bg-black-2">
            <div class="container">
                <div class="section-title col-md-5">
                    <h3>Meet Our</h3>
                    <h2>Agents</h2>
                </div>
                <div class="row team-all">
                    <?php
                        $query="SELECT * FROM user LIMIT 4" ;
                         $result = mysqli_query($conn,$query);
                         while($row = mysqli_fetch_array($result)) {
                             
                             
                             echo '
                                                 <div class="col-lg-3 col-md-6 team-pro">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="php/uploads/'.$row['user_image'].'" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>'.$row['user_name'].'</h3>
                                    <p>Real Estate Agent</p>
                                    <span><a href="agencies-details.php?user='.$row['user_id'].'">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                             
                             '; 
                         } 
                    ?>
                

                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->

        <!-- START SECTION BLOG -->

        <!-- END SECTION BLOG -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="top-footer bg-black-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index.html" class="logo">
                                    <img src="images/logo-yellow.svg" alt="netcom">
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

        <!--register form end -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/transition.min.js"></script>
        <script src="js/transition.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>