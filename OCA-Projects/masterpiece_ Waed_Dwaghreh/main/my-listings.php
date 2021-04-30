<?php
session_start();
require_once('php/connection.php');
if (!isset($_SESSION['auth'])) {

    header('location:login.php');
    session_destroy();
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>my-listings</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                        <a class="active" href="my-listings.php">
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
                        <div class="my-properties">
                            <?php
                            if (@$_GET['success']) {
                                echo    " <div class='notification success closeable'>
                            <p><span>Success!</span> 
                            New property [ " . $_GET['success'] . " ] added successfully.</p>
                            <a class='close' href='#'></a>
                        </div> ";
                            }
                            if (@$_GET['del']) {
                                echo    " <div class='notification error closeable'>
                            <p><span>Deleted!</span> 
                            One property has been deleted successfully.</p>
                            <a class='close' href='#'></a>
                        </div> ";
                            }
                            if (@$_GET['status']) {

                                echo    " <div class='notification notice closeable'>
                            <p><span>Activated!</span> 
                             the property is  now ACTIVE</p>
                            <a class='close' href='#'></a>
                        </div> ";
                            }
                            if (@$_GET['updated'] == "yes") {

                                echo    " <div class='notification notice closeable'>
                            <p><span>Updated!</span> 
                             property updated.</p>
                            <a class='close' href='#'></a>
                        </div> ";
                            }
                            if (@$_GET['updated'] == "no") {

                                echo    " <div class='notification error closeable'>
                            <p><span>Something went wrong!</span> 
                             property update failed.</p>
                            <a class='close' href='#'></a>
                        </div> ";
                            }

                            ?>
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">My Properties</th>
                                        <th class="p-0"></th>
                                        <th>Status</th>
                                        <th>Reviews</th>
                                        <th>Active ?</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM property where user_id='$user_id'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $active = "";
                                        $image_id = $row['image_identifier'];
                                        if (!$row["active"]) {
                                            $active = '
                                          <a href="php/methods.php?active=1&property=' . $row["property_id"] . '" class="btn btn-sm btn-danger"><i class="fas fa-close"></i><span> No</span></a>

                    ';
                                        } else {
                                            $active = '
                                          <a href="php/methods.php?active=0&property=' . $row["property_id"] . '" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Yes</a>
                 ';
                                        }


                                        $sql = "SELECT image_name AS image From property_images WHERE image_identifier  = $image_id LIMIT 1";
                                        $r = mysqli_query($conn, $sql);
                                        $t = mysqli_fetch_assoc($r);
                                        $image_id = $t['image'];
                                        echo '    
                                    <tr>
                                        <td class="image myelist">
                                            <a href="single-property.php?property=' . $row["property_id"] . '"><img alt="my-properties-3" src="php/uploads/' . $image_id . '" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="single-property.php?property=' . $row["property_id"] . '">
                                                    <h2>' . $row["property_name"] . '</h2>
                                                </a>
                                                <figure><i class="lni-map-marker"></i> ' . $row["address"] . '  </figure>
                                                <ul class="starts text-left mb-0">
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>For ' . $row["property_status"] . '</td>
                                        <td>none</td>
                                        <td>' . $active . '
                                        </td>
                                        <td class="actions ui-buttons">
                                            <a href="edit-property.php?p_id=' . $row["property_id"] . '" value="' . $row["property_id"] . '" onclick="declare(this.value);" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                                            <a href="php/methods.php?del=' . $row["property_id"] . '" class="btn btn-secondary" ><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
            ';
                                    } ?>
                                </tbody>
                            </table>
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
        <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
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