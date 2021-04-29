<?php
session_start(); 
require_once('php/connection.php');
if(!$_SESSION['auth']) 
{
    header('location:login.php');
    session_destroy(); 
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
    <title>Dashboard</title>
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
                                        <a class="active" href="dashboard.php">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                        <div class="dashborad-box stat">
                            <h4 class="title">Manage Dashboard</h4>
                            <div class="section-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number">
       <?php
     $user = $_SESSION['user_id'] ; 
     $sql="SELECT COUNT(property_id) AS total From property WHERE user_id = $user"; 
     $r= mysqli_query($conn,$sql); 
     $t= mysqli_fetch_assoc($r);
     echo $t['total']; 
        ?>   
                                                </h6>
                                                <p class="type ml-1">Published Property</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number">
       <?php
     $sql="SELECT COUNT(review_id) AS total From review_list WHERE p_user = $user"; 
     $r= mysqli_query($conn,$sql); 
     $t= mysqli_fetch_assoc($r);
     echo $t['total']; 
        ?>   
                                                </h6>
                                                <p class="type ml-1">Total Reviews</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 dar com mr-3">
                                        <div class="item mb-0">
                                            <div class="icon">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number">
        <?php
     $sql="SELECT COUNT(toure_id) AS total From toure_sqedual WHERE user_id = $user"; 
     $r= mysqli_query($conn,$sql); 
     $t= mysqli_fetch_assoc($r);
     echo $t['total']; 
        ?>                                
                                                </h6>
                                                <p class="type ml-1">scheduled tours</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 dar booked">
                                        <div class="item mb-0">
                                            <div class="icon">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number">
       <?php
     $sql="SELECT COUNT(toure_id) AS total From toure_sqedual WHERE user_id = $user"; 
     $r= mysqli_query($conn,$sql); 
     $t= mysqli_fetch_assoc($r);
     echo $t['total']; 
        ?>   
                                                </h6>
                                                <p class="type ml-1">Times Bookmarked</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                            <?php 
                        if(@$_GET['status']==true)
                        {
                         echo '
                            <div class="notification success closeable">
                            <p>      
                             Your changes have been saved
                          </p>
                            <a class="close" href="#"></a>
                        </div>';
                        }
                           ?>
                        <div class="dashborad-box">
                           
                         
                            <h4 class="title">Your tours  </h4>
                            <div class="section-body">
                                                                <div class="messages">
                                <?php     
                                  $user_id = $_SESSION['user_id'];
                                  $query="SELECT * FROM toure_sqedual WHERE user_id ='$user_id' " ;
                                  $result = mysqli_query($conn,$query);
                                  while($row = mysqli_fetch_array($result)) {
                                      $p_user = $row['p_user'];
                                      $p_id= $row['property_id'];
                                      $p_username = '';
                                      $property_name = '';
                                      $p_user_image =''; 
                                      $delete_button='
                                      ';
                                      $cancel_button = '
                                       <a  href="php/methods.php?accept=no&toure_id='.$row['toure_id'].'" style="text-decoration:none; color:white;"class="btn btn-outline btn-danger btn-anis"> <i class="fas fa-close"></i> Cancel this tour</a>
                                      ';
                                      $status_color = "secondary";
                                      if($row['toure_status']=="Accepted")
                                      {   $status_color = "success";
                                      }
                                         if($row['toure_status']=="Canceled")
                                      {   $status_color = "danger";
                                          $cancel_button = ""; 
                                          if($p_user != $user_id){
                                          $delete_button = '<a  href="php/methods.php?accept=delete&toure_id='.$row['toure_id'].'" style="text-decoration:none; color:white;"class="btn btn-outline btn-danger btn-anis"> <i class="fas fa-trash"></i> Delete this tour</a>';
                                      }}

                                                                      $query2="SELECT * FROM user WHERE user_id ='$p_user' " ;
                                                                      $result2 = mysqli_query($conn,$query2);
                                                                      while($row2 = mysqli_fetch_array($result2)) {
                                                                          $p_username = $row2['user_name']; 
                                                                          $p_user_image = $row2['user_image'];
                                                                      } 
                                                                      
                                                                       $query3="SELECT * FROM property WHERE property_id ='$p_id' " ;
                                                                      $result3 = mysqli_query($conn,$query3);
                                                                      while($row3 = mysqli_fetch_array($result3)) {
                                                                          $property_name = $row3['property_name']; 
                                                                      } 
                                      echo '
                                 <div class="message">
                                        <div class="thumb">
                                            <img class="img-fluid" src="php/uploads/'.$p_user_image.'" alt="">
                                        </div>
                                        <div class="body">
                                            <h6>'.$p_username.'</h6>
                                           <button class="btn btn-outline btn-'.$status_color.' btn-anis"><i class="fas fa-action"></i> Status: '.$row['toure_status'].' </button>
                                            <p class="post-time">'.$row['time_added'].'</p>
                                            <p class="content mb-0 mt-2">
                                                you asked ('.$p_username.') to make tour in ('.$property_name.') on ('.$row['date'].' at '.$row['time'].').
                                                </p>
                                                    <button class="btn btn-outline btn-primary btn-anis ml-0"><i class="fas fa-male"></i> Adlut: '.$row['adults'].' </button>
                                                    <button class="btn btn-outline btn-warning btn-anis"> <i class="fas fa-child"></i> Children: '.$row['childs'].' </button>
                                            <div class="controller">
                                                     '.$cancel_button.'
                                                     '.$delete_button.'
                                            </div>
                                        </div>
                                    </div>
                                      '; 
                                  }
                                   ?> 
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="dashborad-box">
                            <h4 class="title">Your properties tours  </h4>
                            <div class="section-body">
                                                                <div class="messages">
                                <?php     
                                  $user_id = $_SESSION['user_id'];
                                  $query="SELECT * FROM toure_sqedual WHERE p_user ='$user_id' " ;
                                  $result = mysqli_query($conn,$query);
                                  while($row = mysqli_fetch_array($result)) {
                                      $p_user = $row['user_id'];
                                      $p_id= $row['property_id'];
                                      $p_username = '';
                                      $property_name = '';
                                      $p_user_image =''; 
                                      $accept_button = '
                                      <a href="php/methods.php?accept=yes&toure_id='.$row['toure_id'].'" style="text-decoration:none; color:white;" class="btn btn-outline btn-success btn-anis"> <i class="fas fa-check"></i> Accept this tour</a>
                                      ';
                                      $cancel_button = '
                                       <a  href="php/methods.php?accept=no&toure_id='.$row['toure_id'].'" style="text-decoration:none; color:white;"class="btn btn-outline btn-danger btn-anis"> <i class="fas fa-close"></i> Cancel this tour</a>
                                      ';
                                      $status_color = "secondary";
                                      if($row['toure_status']=="Accepted")
                                      {   $status_color = "success";
                                          $accept_button = ""; 
                                      }
                                         if($row['toure_status']=="Canceled")
                                      {   $status_color = "danger";
                                          $cancel_button = ""; 
                                          $accept_button = ""; 
                                      }
                                      
                                                                      $query2="SELECT * FROM user WHERE user_id ='$p_user' " ;
                                                                      $result2 = mysqli_query($conn,$query2);
                                                                      while($row2 = mysqli_fetch_array($result2)) {
                                                                          $p_username = $row2['user_name']; 
                                                                          $p_user_image = $row2['user_image'];
                                                                      } 
                                                                      
                                                                       $query3="SELECT * FROM property WHERE property_id ='$p_id' " ;
                                                                      $result3 = mysqli_query($conn,$query3);
                                                                      while($row3 = mysqli_fetch_array($result3)) {
                                                                          $property_name = $row3['property_name']; 
                                                                      } 
                                         if($row['toure_status']!="Canceled") {                            
                                      echo '
                                 <div class="message">
                                        <div class="thumb">
                                            <img class="img-fluid" src="php/uploads/'.$p_user_image.'" alt="">
                                        </div>
                                        <div class="body">
                                            <h6>'.$p_username.'</h6>
                                           <button class="btn btn-outline btn-'.$status_color.' btn-anis"><i class="fas fa-action"></i> Status: '.$row['toure_status'].' </button>
                                            <p class="post-time">'.$row['time_added'].'</p>
                                            <p class="content mb-0 mt-2">
                                                ('.$p_username.') asked you to make tour in ('.$property_name.') on ('.$row['date'].' at '.$row['time'].').
                                                </p>
                                                    <button class="btn btn-outline btn-primary btn-anis ml-0"><i class="fas fa-male"></i> Adlut: '.$row['adults'].' </button>
                                                    <button class="btn btn-outline btn-warning btn-anis"> <i class="fas fa-child"></i> Children: '.$row['childs'].' </button>
                                            <div class="controller">
                                                    '.$accept_button.'
                                                    '.$cancel_button.'
                                            </div>
                                        </div>
                                    </div>
                                      '; }
                                  }
                                   ?> 
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="dashborad-box">
                            <h4 class="title">Last 3 Reviews</h4>
                            <div class="section-body">
                                <div class="reviews">
                                                       <?php  $user = $_SESSION['user_id'];
                                                         $query="SELECT * FROM review_list WHERE p_user=$user ORDER BY review_id desc LIMIT 3";
                                                         $result=mysqli_query($conn,$query);
                                                             while($row = mysqli_fetch_array($result)) {  
                                                                 
                                                                 echo ' 
                                                                  <div class="review">
                                        <div class="thumb">
                                            <img class="img-fluid" src="php/uploads/'.$row['user_image'].'" alt="">
                                        </div>
                                        <div class="body">
                                            <h5>'.$row['property_name'].'</h5>
                                            <h6>'.$row['user_name'].'</h6>
                                            <p class="post-time">'.$row['review_date'].'</p>
                                            <p class="content mb-0 mt-2">
                                            --------------------------------------------------------------------------------------------------------------------
                                            '.$row['review_desc'].'</p>
                                            <ul class="starts mb-0">
                                                <li> '.$row['rating'].' <i class="fa fa-star"></i>
                                                </li>
                                                
                                            </ul>
                                            <div class="controller">
                                                <ul>
                                                    <li><a href="single-property.php?property='.$row['property_id'].'"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                                                 ' ; }
                                                                 
                                                                 ?>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- START FOOTER -->
                        <div class="second-footer">
                            <div class="container">
                                <p>2021 © Copyright - All Rights Reserved.</p>
                                <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By Code-Theme</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION DASHBOARD -->
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->
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

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

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
        <script src="js/ui-lement.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>