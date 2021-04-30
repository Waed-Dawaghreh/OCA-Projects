<?php
session_start();
require_once('php/connection.php');
if (!isset($_SESSION['auth'])) {
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
    <title>Add Properties</title>
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
            display: none;
        }

        @media only screen and (max-width: 600px) {

            #navigation {
                display: block;
            }
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
                                #navigation {
                                    display: none;
                                }

                                @media only screen and (max-width: 600px) {
                                    #navigation {
                                        display: block;
                                    }
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
                                        <a href="dashboard.php">
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
                                <span><img src="php/uploads/<?php echo $_SESSION['image']; ?>" alt=""></span><?php if (isset($_SESSION['auth'])) {
                                                                                                                    echo $_SESSION['username'];
                                                                                                                } else {
                                                                                                                    echo "Guest";
                                                                                                                } ?>
                            </div>
                            <?php if (isset($_SESSION['auth'])) {
                                echo "  
                             <ul>
                              <li><a href='dashboard.php'> Dashboard</a></li> 
                            <li><a href='user-profile.php'> Edit profile</a></li>
                            <li><a href='add-property.php'> Add Property</a></li>
                            <li><a href='change-password.php'> Change Password</a></li>
                            <li><a href='php/logout.php?logout'>Log Out</a></li>
                        </ul>
                        ";
                            } else {
                                echo "  <ul>
                            <li><a href='login.php'> Log In First</a></li> </ul>";
                            } ?>

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
                                        <a class="active" href="add-property.php">
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
                    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                        <div class="single-add-property">

                            <h3>Property description and price</h3>
                            <div class="property-form-group">
                                <form action="php/add_new_property.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Property Title</label>
                                                <input type="text" name="pro-name" name="title" id="title" placeholder="Enter your property title" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Property Description</label>
                                                <textarea id="description" name="pro-desc" placeholder="Describe about your property" required></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group location">
                                                <label> Status </label>
                                                <select name="pro-status" class="nice-select form-control wide" tabindex="0" required>
                                                    <option value="rent" class="option selected ">For Rent</option>
                                                    <option value="sale" class="option selected ">For Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group location">
                                                <label> Type </label>
                                                <select name="pro-type" class="nice-select form-control wide" tabindex="0" required>
                                                    <option value="Family House" class="option selected ">Family House</option>
                                                    <option value="Apartment" class="option selected ">Apartment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group ">
                                                <label for="bedrooms"> Bedrooms </label>
                                                <select name="pro-bedrooms" class="nice-select form-control wide" tabindex="0" required>
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
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group ">
                                                <label> Bathrooms </label>
                                                <select name="pro-bathrooms" class="nice-select form-control wide" tabindex="0" required>
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
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group location">
                                                <label for="city">City</label>
                                                <select name="pro-city" class="nice-select form-control wide" tabindex="0" required>
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
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p>
                                                <label for="address">Address</label>
                                                <input type="text" name="pro-address" placeholder="Enter Your Address" id="address" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb first">
                                                <label for="latitude">Google Maps latitude</label>
                                                <input type="text" name="pro-latitude" placeholder="Google Maps latitude" id="latitude" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="longitude">Google Maps longitude</label>
                                                <input type="text" name="pro-longitude" placeholder="Google Maps longitude" id="longitude" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Price</label>
                                                <input type="text" name="pro-price" placeholder="USD" id="price" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area</label>
                                                <input type="text" name="pro-area" placeholder="Sqft" id="area" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Building Age</label>
                                                <input type="number" name="pro-age" placeholder="in years" required>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-add-property">
                                        <h3>property Media</h3>
                                        <div class="notification warning closeable">
                                            <p><span>Warning!</span> Maximum uploads is 5 files per property. <br> Files must be in one of the following extentions {jpg, jpeg, png, gif} !</p>
                                            <a class="close" href="#"></a>
                                        </div>
                                        <div class="property-form-group">
                                            <div class="row">
                                                <div class="col-md-12 ui-buttons">
                                                    <input class="btn btn-secondary" type="file" name="files[]" multiple required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property-button pt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-elemts">
                                                    <button type="submit" name="pro-submit">Submit Property</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- END SECTION USER PROFILE -->

    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="second-footer">
            <div class="container">
                <p>2021 © Copyright - All Rights Reserved.</p>
                <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By Code-Theme</p>
            </div>
        </div>
    </footer>

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
    <script src="js/dropzone.js"></script>

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
    <script>
        $(function() {
            $("button[type = 'submit']").click(function() {
                var $fileUpload = $("input[type='file']");
                if (parseInt($fileUpload.get(0).files.length) > 5) {
                    if (!alert('You are only allowed to upload a maximum of 5 files')) {
                        window.location.reload();
                    }
                }
            });
        });
        $(".dropzone").dropzone({
            dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
        });
    </script>
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