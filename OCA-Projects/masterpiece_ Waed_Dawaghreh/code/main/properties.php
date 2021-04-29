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
    <title>Properties Finder</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages int_dark_bg st-1 agents hp-6 full hd-white">
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
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-right featured portfolio blog pt-5">
            <div class="container">
                <section class="headings-2 pt-0 pb-55">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="pb-2"><a href="index.html">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                                </div>
                                <h3>Property Finder</h3>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                                            <?php 
//---------------------/////////////////////////---------------------//
function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));
//---------------------/////////////////////////---------------------//
}
$keys = "Null";

            //Search entries  
            $by_location  = inject_checker($conn, $_GET['location']);
            $by_type      = inject_checker($conn, $_GET['type']);
            $by_bedrooms  = inject_checker($conn, $_GET['bedrooms']);
            $by_bathrooms = inject_checker($conn, $_GET['bathrooms']);
            $by_min_area  = inject_checker($conn, $_GET['phone']);
            $by_max_area  = inject_checker($conn, $_GET['phone']);
            $by_min_price = inject_checker($conn, $_GET['phone']);
            $by_max_price = inject_checker($conn, $_GET['phone']);
            $by_status    = inject_checker($conn, $_GET['status']);
//---------------------/////////////////////////---------------------//
    $query = "SELECT * FROM property";
    $conditions = array();
    if(! empty($by_location)) {
      $conditions[] = "city_id='$by_location'";
                 $getlocation =  "SELECT city_name FROM city WHERE city_id = $by_location" ; 
                 $result = mysqli_query($conn, $getlocation); 
                 $row = $result -> fetch_assoc();
                 $location = $row["city_name"] ; 
    }
    if(! empty($by_type)) {
      $conditions[] = "property_type='$by_type'";
    }
    if(! empty($by_bathrooms)) {
      $conditions[] = "property_bathrooms='$by_bathrooms'";
    }
    if(! empty($by_bedrooms)) {
      $conditions[] = "property_bedrooms='$by_bedrooms'";
    }
       if(! empty($by_status)) {
      $conditions[] = "property_status='$by_status'";
    }
      $conditions[] = "active='1'";
    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }
       $run_query = mysqli_query($conn, $sql);
                      if($run_query) {
               
        $keys="Your search keywords  : location: $location | Type: $by_type | Bathrooms: $by_bathrooms | Bedrooms: $by_bedrooms | Status: $by_status <br> "; 
        echo $keys ; 
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
                                            <a href="agencies-details.php?user='.$row['user_id'].'">
                                                <i class="fa fa-user"></i> '.$u_id.'
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

        ' ; 
                      } } 


?>                             
                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="widget">
                            <!-- Search Fields -->
                            <div class="widget-boxed main-search-field">
                                <div class="widget-boxed-header">
                                    <h4>Find Your House</h4>
                                </div>
                                <!-- Search Form -->
                                <div class="trip-search">
                                    <form class="form">
                                        <!-- Form Location -->
                                      <div class="form-group ">
                                            <select  name="location"  class=" form-control " tabindex="0">
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
                                                    <option value="Family House" class="option selected ">Family Home</option>
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
                                                <select  name="bedrooms"  class="nice-select form-control wide" tabindex="0">
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
                                                <select name="bathrooms" class="nice-select form-control wide" tabindex="0">
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
                                             <!-- Area Range -->
                                     <div class="form-group">
                                        <label>Area Size</label>
                                                                                <div class="clearfix"></div>
                                        <br>
                                        <label>Min :</label>
                                        <input class="form-control" type='number' name="minArea"> 
                                         <br>
                                                                                 <div class="clearfix"></div>
                                        <label>Max :</label>
                                        <input class="form-control" type='number' name="maxArea"> 
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                    <!-- Price Range -->
                                    <div class="form-group">
                                        <label>Price Range</label>
                                                                                <div class="clearfix"></div>
                                        <br>
                                        <label>Min :</label>
                                        <input class="form-control" type='number' name="minPrice"> 
                                         <br>
                                                                                 <div class="clearfix"></div>

                                        <label>Max :</label>
                                        <input class="form-control" type='number' name="maxPrice"> 
                                        <div class="clearfix"></div>
                                    </div>
                                      <div class="col-lg-12 no-pds">
                                    <div class="at-col-default-mar">
                                        <button class="btn btn-default hvr-bounce-to-right" name="search" type="submit">Search</button>
                                    </div>
                                </div>
                                    
                                    </form>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

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
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/light.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/inner.js"></script>
        <script src="js/color-switcher.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>