<?php
session_start(); 
require_once('php/connection.php');
if(!$_SESSION['auth']) 
{
    header('location:login.php');
    session_destroy(); 
}
else 
{
    $user=$_SESSION['user_id']; 
          $query="SELECT * FROM user WHERE user_id = $user "; 
                 $result=mysqli_query($conn,$query);
                   if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {  
                     $_SESSION['username']= $row['user_name'];
                     $_SESSION['email']   = $row['user_email'];
                     $_SESSION['image']   = $row['user_image'];
                     $_SESSION['phone']   = $row['user_phone'];
                     $_SESSION['location'] = $row['user_address'];
                     $_SESSION['desc']     = $row['user_desc'];    
                }}
}
?> 

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>profile</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
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
    #navigation {
        display:none;
    } 
    @media only screen and (max-width: 600px) {
   
     #navigation {
        display:block; }
    }   
}
</style>
</head>

<body class="maxw1600 m0a ui-elements dashboard-bd">
    <!-- Wrapper -->
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                                <a href="index.php"><img src="images/logo.svg" alt=""></a>
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
<style> 
                            #navigation {display:none;}
                            @media only screen and (max-width: 600px) {
                                #navigation { display:block;}
                            }
                            </style>
                            <nav id="navigation" class="style-1 black">
                            <ul id="responsive">
                                 <li>
                                        <a class="" href="index.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="dashboard.php">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user-profile.php">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-listings.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-property.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>Add Property
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.php">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="php/logout.php?logout">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                            </ul>
                        </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / -->
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
                    </div>
                </div>
                <!-- Header / End -->
            </header>
       </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION DASHBOARD -->
        <section class="user-page section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <div class="user-profile-box mb-0">
                            <div class="sidebar-header"><img src="images/logo-blue.svg" alt="header-logo2.png"> </div>
                            <div class="header clearfix">
                                <img src="php/uploads/<?php echo $_SESSION['image']; ?> " alt="avatar" class="img-fluid profile-img">
                            </div>
                            <div class="active-user">
                                <h2> <?php echo $_SESSION['username']; ?></h2>
                            </div>
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                        <li>
                                        <a class="" href="index.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li>
                                        <a class="" href="dashboard.php">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="active" href="user-profile.php">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-listings.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-property.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>Add Property
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="change-password.php">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="php/logout.php?logout">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
                         <?php 
                        if(@$_GET['success'])
                        {
                         echo    " <div class='notification success closeable'>
                            <p><span>Success!</span> 
                              ".$_GET['success']." </p>
                            <a class='close' href='#'></a>
                        </div> " ;                          
                        }
                           ?>
                        <div class="widget-boxed-header">
                            <h4>Profile Details</h4>
                        </div>
                        <div class="sidebar-widget author-widget2">
                            <div class="author-box clearfix">
                                <img src="php/uploads/<?php echo $_SESSION['image']; ?>" alt="author-image" class="author__img">
                                <h4 class="author__title"><?php echo $_SESSION['username']; ?></h4>
                                <p class="author__meta">Agent of Property</p>
                                <br>
                                  <form action="php/upload_profile_pic.php" method="POST" enctype="multipart/form-data"> 
                                  
                                  <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Change Profile Picture</label>
                                                <input type="file" name="fileToUpload" class="form-control ui-buttons">
                                                <button  type="submit" name="pic-submit" class="ui-buttons btn btn-primary btn-lg mt-2">Update picture</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <ul class="author__contact">
                                <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span><?php echo $_SESSION['location']; ?></li>
                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#"><?php echo $_SESSION['phone']; ?></a></li>
                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#"><?php echo $_SESSION['email']; ?></a></li>
                            </ul>
                        </div>
                                                <div class="dashborad-box mb-0">
                            <h4 class="heading pt-0">Update Personal Information </h4>
                            <div class="section-inforamation">
                                <form action="php/update_profile.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="<?php echo $_SESSION['username'];?> ">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" name="email" class="form-control" placeholder="<?php echo $_SESSION['email'];?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" class="form-control" placeholder="<?php echo $_SESSION['phone'];?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="<?php echo $_SESSION['location'];?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>About Yourself</label>
                                                <textarea name="desc" class="form-control" placeholder="<?php echo $_SESSION['desc'];?>"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button  type="submit" name="profile-submit" class="ui-buttons btn btn-primary btn-lg mt-2">Update !</button>
                                </form>
                                
                                
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <div class="second-footer ad mt-3">
            <div class="container">
                <p>2021 © Copyright - All Rights Reserved.</p>
                <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By Code-Theme</p>
            </div>
        </div>

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
            <script src="js/ui-lement.js"></script>

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

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>