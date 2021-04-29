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
    <title>Property Details</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/timedropper.css">
    <link rel="stylesheet" href="css/datedropper.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>


<body class="inner-pages ui-elements int_dark_bg agents homepage-4 hd-white">
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
                            <a href="index.html"><img src="images/logo-white-1.svg" data-sticky-logo="images/logo-red.svg" alt=""></a>
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
                            <span><img src="images/testimonials/ts-1.jpg" alt=""></span><?php if (isset($_SESSION['auth'])) { echo $_SESSION['username']; } else { echo "Guest";} ?>
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

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->
                        <div class="header-widget sign-in">
                            <div class="show-reg-form "><a href="#">Owner?</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->
                    <!-- lang-wrap-->
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->
        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <div class="single-property-4">
            <div class="container-fluid p0">
                <div class="row">
                    <?php
             if(!empty($_GET['property'])){
             $id= $_GET['property'];   
             $has_app = false; 
             $query="SELECT * FROM property WHERE property_id ='$id' AND active = 1 " ;
             $images= ""; 
             $p_user = $property_name = $property_desc = $property_status = $property_type = $property_bedrooms = $property_bathrooms = $property_rooms = $property_features = $property_price = $property_area_size = $building_age = $address = $longitude = $latitude = ""; 
             $result = mysqli_query($conn,$query);
             while($row = mysqli_fetch_array($result)) {
$active = $row["active"];                 
$p_user= $row["user_id"]; 
$property_name= $row["property_name"]; 
$property_desc= $row["property_desc"];  
$property_status= $row["property_status"]; 
$property_type= $row["property_type"]; 
$property_bedrooms= $row["property_bedrooms"]; 
$property_bathrooms= $row["property_bathrooms"]; 
$property_features= $row["property_features"]; 
$property_price= $row["property_price"]; 
$property_area_size= $row["property_area_size"]; 
$building_age= $row["building_age"]; 
$address= $row["address"]; 
$longitude= $row["longitude"]; 
$latitude= $row["latitude"]; 
$image_id = $row['image_identifier'];  
                                                   $sql="SELECT image_name From property_images WHERE image_identifier  = $image_id LIMIT 5"; 
                                             $r= mysqli_query($conn,$sql); 
                                             while($row = mysqli_fetch_assoc($r)) { 
                                                 $images[] = $row; 
                                             } 
                                              $sql="SELECT city_name AS city From city WHERE city_id  = ".$row["city_id"]." "; 
                                             $r= mysqli_query($conn,$sql); 
                                             $t= mysqli_fetch_assoc($r);
                                             $city = $t['city']; 
               }
              
               $query="SELECT * FROM user WHERE user_id ='$p_user' " ;
               $result = mysqli_query($conn,$query);
               $user_name = $user_email = $user_image = $user_address = $user_phone =""; 
               while($row = mysqli_fetch_array($result)) {  
                   $user_name = $row['user_name'];
                   $user_email = $row['user_email'];
                   $user_address = $row['user_address'];
                   $user_phone = $row['user_phone'];
                   $user_image = $row['user_image'];

               } 

               }?> 
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="row m0">
                            <div class="col-lg-12 p0">
                                <div class="popup-images">
                                    <a class="popup-img" href="php/uploads/<?php foreach($images[0] as $data) { echo $data;}?>"><img class="img-fluid w100" src="php/uploads/<?php foreach($images[0] as $data) { echo $data;}?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="row m0">
                            <div class="col-sm-6 col-lg-6 p0">
                                <div class="popup-images">
                                    <a class="popup-img" href="php/uploads/<?php foreach($images[1] as $data) { echo $data;}?>"><img class="img-fluid w100" src="php/uploads/<?php foreach($images[1] as $data) { echo $data;}?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 p0">
                                <div class="popup-images">
                                    <a class="popup-img" href="php/uploads/<?php foreach($images[2] as $data) { echo $data;}?>"><img class="img-fluid w100" src="php/uploads/<?php foreach($images[2] as $data) { echo $data;}?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 p0">
                                <div class="popup-images">
                                    <a class="popup-img" href="php/uploads/<?php foreach($images[3] as $data) { echo $data;}?>"><img class="img-fluid w100" src="php/uploads/<?php foreach($images[3] as $data) { echo $data;}?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 p0">
                                <div class="popup-images">
                                    <a class="popup-img" href="php/uploads/<?php foreach($images[4] as $data) { echo $data;}?>"><img class="img-fluid w100" src="php/uploads/<?php foreach($images[4] as $data) { echo $data;}?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="single-proper blog details">
            <div class="container">
                 <?php if(@$_GET['review'])
                        {
                        
                         echo    " <div class='notification warning closeable'>
                            <p>
                             Your review has been saved !
                             </p>
                            <a class='close' href='#'></a>
                        </div> " ;   } 
                        ?>
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3><?php echo $property_name;?> <span class="mrg-l-5 category-tag">For <?php echo $property_status;?></span></h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo $address;?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single detail-wrapper mr-2">
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h4>$<?php echo $property_price;?>  </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Star Description -->
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3" style="width:90% !important;">
                                        <?php echo $property_desc;?>
                                    </p>
                                    
                                   
                                </div>
                                <!-- End Description -->
                            </div>
                        </div>
                        <!-- Star Property Details -->
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Property Details</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">Property Type:</span>
                                    <span class="det"><?php echo $property_type;?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property status:</span>
                                    <span class="det">For <?php echo $property_status;?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property Price:</span>
                                    <span class="det">$<?php echo $property_price;?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bedrooms:</span>
                                    <span class="det"><?php echo $property_bedrooms;?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bath:</span>
                                    <span class="det"><?php echo $property_bathrooms;?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Building Age:</span>
                                    <span class="det"><?php echo $building_age;?> year/s</span>
                                </li>
                            </ul>
                        </div>
                        <div class="property-location map">
                            <h5>Location</h5>
                            <div class="divider-fade"></div>
                            <div id="map-contact" class="contact-map"></div>
                        </div>
                        <!-- Star Reviews -->
                        <section class="reviews comments">
                           
                            <?php
                                                         ////////////////check if user has view    
                                                         $has_view;
                                                         $user = $_SESSION['user_id'];
                                                         $query="SELECT * FROM review WHERE user_id=$user AND property_id = $id";
                                                         $result=mysqli_query($conn,$query);
                                                             while($row = mysqli_fetch_array($result)) {  
                                                                 
                                                                 echo '
                                                                  <h3 class="mb-5">Your Review :</h3>
                              <div class="row mb-5">
                                <ul class="col-12 commented pl-0">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="php/uploads/'.$_SESSION['image'].'" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <div class="conra">
                                                <h5 class="mb-2">'.$_SESSION['username'].'</h5>
                                                <div class="rating-box">
                                                    <div class="detail-list-rating mr-0">
                                                       '.$row['rating'].' <i class="fa fa-star"></i>
                                                         <a href="php/methods.php?del_review='.$row["review_id"].'&property='.$id.'" class="btn btn-secondary" ><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-4">'.$row['review_date'].'</p>
                                            <p>'.$row['review_desc'].' .
                                            </p>
                                        </div>
                                        
                                    </li>

                                </ul>
                            </div>

                                                                 '; 
                                                             }
                            $query="SELECT * FROM review_list WHERE property_id=$id";
                                                         $result=mysqli_query($conn,$query);
                                                             while($row = mysqli_fetch_array($result)) {  
                                                                 echo '
                                                                  <h3 class="mb-5">Other Reviews:</h3>
                              <div class="row mb-5">
                                <ul class="col-12 commented pl-0">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="php/uploads/'.$row['user_image'].'" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <div class="conra">
                                                <h5 class="mb-2">'.$row['user_name'].'</h5>
                                                <div class="rating-box">
                                                    <div class="detail-list-rating mr-0">
                                                       '.$row['rating'].' <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-4">'.$row['review_date'].'</p>
                                            <p>'.$row['review_desc'].' .
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                                                                 '; 
                                                             }                                    
                                                               
                                                               ?> 
                        </section>
                        <!-- End Reviews -->
                        <!-- Star Add Review -->
                        <section class="single reviews leve-comments details">
                           <form action="php/methods.php" method="POST">
                            <div id="add-review" class="add-review-box">
                                <!-- Add Review -->
                                <h3 class="listing-desc-headline margin-bottom-20 mb-4">Add Review</h3>
                                <span class="leave-rating-title">Your rating for this listing</span>
                                <!-- Rating / Upload Button -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <!-- Leave Rating -->
                                        <div class="clearfix"></div>
                                        <div class="leave-rating margin-bottom-30">
                                            <input type="radio" name="rating" id="rating-1" value="1" />
                                            <label for="rating-1"onclick="rating('5');" class="fa fa-star"></label>
                                            <input type="radio" name="rating" id="rating-2" value="2" />
                                            <label for="rating-2" onclick="rating('4');" class="fa fa-star"></label>
                                            <input type="radio" name="rating" id="rating-3" value="3" />
                                            <label for="rating-3"onclick="rating('3');" class="fa fa-star"></label>
                                            <input type="radio" name="rating" id="rating-4" value="4" />
                                            <label for="rating-4"onclick="rating('2');"  class="fa fa-star"></label>
                                            <input type="radio"  name="rating" id="rating-5" value="5" />
                                            <label for="rating-5" onclick="rating('1');" class="fa fa-star"></label>
                                            <input type="hidden" id="final_rate" name="final_rate" value=""> 
                                            <script> 
                                            function rating(a){
                                                document.getElementById('final_rate').value= a; 
                                                console.log(a);
                                            }
                                            </script>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 data">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control"><?php echo $_SESSION['username'];?> </label>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" name="review_desc" id="exampleTextarea" rows="8" placeholder="Review" required></textarea>
                                            </div>
                                             <?php
                                                    /////////////////check if user has view    
                                                         $has_view;
                                                         $user = $_SESSION['user_id'];
                                                         $query="SELECT * FROM review WHERE user_id=$user AND property_id = $id";
                                                         $result=mysqli_query($conn,$query);
                                                           if ($result->num_rows > 0) {
                                                               $has_view=true;
                                                               }               
                                                    if(!isset($_SESSION['user_id']))
                                                    {
                                                        echo '<a href="login.php" class="btn  btn-danger btn-anis">Log in first to submit</a>'; 
                                                    }
                                                    elseif($_SESSION['user_id']==$p_user) {
                                                       echo '<a disabled class="btn  btn-warning btn-anis">RESTRICTED! You Are The Owner</a>'; 
                                                    }
                                                    elseif(!$has_view){
                                                       echo '<input type="submit" name="review_submit" class="btn  btn-secondary btn-anis" value="submit">'; 
                                                       }
                                                        else{
                                                          
                                                           echo'<h4><i class="fa fa-warning pr-3 padd-r-10"></i>You already had review on this property , You can delete or edit your previous review above.</h4>';
                                                     
                                                        }
                                                    ?> 
                                    </div>
                                    <input type="hidden" name="property_id" value="<?php echo $id;?>"> 
                                </div>
                            </div>
                            </form>
                        </section>
                        <!-- End Add Review -->
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- Start: Schedule a Tour -->
                            <div class="schedule widget-boxed mt-30">
                                <?php if(@$_GET['status'])
                        {
                        
                         echo    " <div class='notification notice closeable'>
                            <p><span>Status: On Hold</span>    <br>
                            Appointment has been scheduled successfully <br> See your dashboard for more information!
                             </p>
                            <a class='close' href='#'></a>
                        </div> " ;   } 
                        if(@$_GET['same_day'])
                        {
                        
                         echo    " <div class='notification error closeable'>
                            <p><span>Status: Refuse</span>    <br>
                            You can't add more than one appointment on the same day !
                             </p>
                            <a class='close' href='#'></a>
                        </div> " ;   }
                        ?>
                                <div class="widget-boxed-header">
                                    <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Schedule a Tour</h4>
                                </div>
                                
                             
                                   <form method="POST" action="php/methods.php"> 
                                <div class="widget-boxed-body">
                                    <div class="row">
                                     
                                        <div class="col-lg-6 col-md-12 book">
                                            <input type="date" name="t_date" id="reservation-date" data-lang="en" data-large-mode="true" data-min-year="2021" data-max-year="3000"  data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 book2">
                                            <input type="text" name="t_time" id="reservation-time" class="form-control" readonly="">
                                        </div>
                                            <input type="hidden" value="<?php echo $p_user;?>" name="t_owner" id="reservation-time" class="form-control" readonly="">
                                    </div>
                                    <div class="row mrg-top-15 mb-3">
                                        <div class="col-lg-6 col-md-12 mt-4">
                                            <label class="mb-4">Adult</label>
                                            <div class="input-group">
                                            
                                                <input type="number" name="t_adults" class="border-0 text-center form-control input-number" min="1" max="10" value="0">
                                             
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mt-4">
                                            <label class="mb-4">Children</label>
                                            <div class="input-group">
                                             
                                                <input type="number" name="t_childs" class="border-0 text-center form-control input-number" min="0" max="10" value="0">
                                         
                                            </div>
                                               <input type="hidden" name="p_id" value="<?php echo $id;?>"> 
                                        </div>
                                    </div>
                                                <div class=" ui-buttons effect"> 
                                                    <?php
                                                    /////////////////check if user has appointment                
                                                         $has_ap;
                                                         $user = $_SESSION['user_id'];
                                                         $query="SELECT * FROM toure_sqedual WHERE user_id=$user AND property_id = $id";
                                                         $result=mysqli_query($conn,$query);
                                                           if ($result->num_rows > 0) {
                                                               $has_ap=true;
                                                               }               
                                                    if(!isset($_SESSION['user_id']))
                                                    {
                                                        echo '<a href="login.php" class="btn  btn-danger btn-anis">Log in first to submit</a>'; 
                                                    }
                                                    elseif ($_SESSION['user_id']==$p_user) {
                                                       echo '<a disabled class="btn  btn-warning btn-anis">RESTRICTED! You Are The Owner</a>'; 
                                                    }
                                                    elseif(!$has_ap){
                                                       echo '<input type="submit" name="tour_submit" class="btn  btn-secondary btn-anis" value="submit">'; 
                                                    }
                                                        else{
                                                           echo'<h4><i class="fa fa-calendar pr-3 padd-r-10"></i>You already had appointment on this property <br> Check your dashboard for more informations!</h4>';
                                                    }
                                                    ?> 
                                                    </div> 
                                                    
                                                    </form>
                                </div>
                            </div>
                            <!-- End: Schedule a Tour -->
                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Agent Information</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget author-widget2">
                                            <div class="author-box clearfix">
                                                <img src="php/uploads/<?php echo $user_image;?>" alt="author-image" class="author__img">
                                                <h4 class="author__title"><?php echo $user_name?></h4>
                                                <p class="author__meta">Agent of Property</p>
                                            </div>
                                            <ul class="author__contact">
                                                <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span><?php echo $user_address?></li>
                                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:<?php echo $user_phone?>">+<?php echo $user_phone?></a></li>
                                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:<?php echo $user_email?>"><?php echo $user_email?></a></li>
                                            </ul>
                                      
                                        </div>
                                    </div>
                                </div>
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
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- START SIMILAR PROPERTIES -->

                <!-- END SIMILAR PROPERTIES -->
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
        <script src="js/jquery-ui.js"></script>
        <script src="js/range-slider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/timedropper.js"></script>
        <script src="js/datedropper.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-gesture-handling.min.js"></script>
        <script src="js/leaflet-providers.js"></script>
        <script src="js/leaflet.markercluster.js"></script>
        <script src="js/map-single.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/inner.js"></script>
        <script src="js/ui-lement.js"></script>

        <script>
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                }
            });
        </script>

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

        <script>
            $(document).ready(function() {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });
        </script>

        <script>
            $('.slick-carousel').each(function() {
                var slider = $(this);
                $(this).slick({
                    infinite: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0'
                });

                $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                    slider.slick('slickPrev');
                });
                $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                    slider.slick('slickNext');
                });
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>