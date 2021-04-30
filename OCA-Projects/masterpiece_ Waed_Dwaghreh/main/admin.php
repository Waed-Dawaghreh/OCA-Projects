<?php
session_start();
if(!isset($_SESSION['admin'])){
    session_destroy();
    header('location:admin-login.php');

    
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
    <title>Admin Dashboard</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
    <style>
        /* The Modal (background) */
        
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }
        /* Modal Content */
        
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        /* The Close Button */
        
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="inner-pages ui-elements hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <img src="images/logo.svg" alt="">
                            <div class="header-widget">
                                <a>Admin Dashboard<i class="fas fa-laptop-house ml-2"></i></a>
                            </div>
                        </div>
                        <!-- Mobile Navigation -->
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span><img src="images/testimonials/ts-1.jpg" alt=""></span>Hi, Admin!
                        </div>
                        <ul>
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->

                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->
          
        <!-- START SECTION UI ELEMENT -->
        <section class="ui-element">
            <div class="container">
                <section class="headings-2 pt-0 hee bg-white">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <h3>Welcome back admin!</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb70">
                        <div class="tabbed-content button-tabs">
                            <ul class="tabs">
                                <li class="active">
                                    <div class="tab-title">
                                        <span>All Users</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            All Users
                                            <table class="basic-table">
                                                <tr>
                                                    <th>All Users</th>
                                                    <th>User ID</th>
                                                    <th>Full Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email Address</th>
                                                    <th>Description</th>
                                                    <th> Options </th>
                                                </tr>
                                              
                           <?php
                           require_once('php/connection.php');
                           if(isset($_GET['delete'])){
                               $del = $_GET['delete']; 
                               $query="DELETE FROM property WHERE property_id=$del";
                               $run_query = mysqli_query($conn,$query);
                                 echo"Property Deleted Successfully!";

                           }
                            if(isset($_GET['delete_user'])){
                               $del = $_GET['delete_user']; 
                               $query="DELETE FROM user WHERE user_id=$del";
                               $run_query = mysqli_query($conn,$query);
                               $query="DELETE FROM toure_sqedual WHERE user_id=$del";
                               $run_query = mysqli_query($conn,$query);
                               $query="DELETE FROM review WHERE user_id=$del";
                               $run_query = mysqli_query($conn,$query);
                               $query="DELETE FROM property WHERE user_id=$del";
                               $run_query = mysqli_query($conn,$query);
                                echo"User Deleted Successfully!";
                           }
                              if(isset($_POST['change_password'])){
                               $u = $_POST['user_id']; 
                               $p = base64_encode($_POST['new_password']);
                               $query = "UPDATE user SET user_password ='$p' WHERE user_id ='$u'";
                               $run_query = mysqli_query($conn,$query);
                               echo"User Password Changed Successfully!";
                           }
                           
                           $query="SELECT * FROM user";
                           $run_query = mysqli_query($conn,$query);
                           while($row = mysqli_fetch_array($run_query))
                           { echo ' <tr>
                                                    <td>
                                                        <span><img src="php/uploads/'.$row['user_image'].'" alt=""></span>
                                                    </td>
                                                    <td>'.$row['user_id'].'</td>
                                                    <td>'.$row['user_name'].'</td>
                                                    <td>'.$row['user_phone'].'</td>
                                                    <td>'.$row['user_email'].'</td>
                                                    <td>'.$row['user_desc'].'</td>
                                                    <td>
                                                        <div class="controller">
                                                            <a href="admin.php?delete_user='.$row['user_id'].'"><i class="fa fa-trash"></i></a>
                                                            <a href="agencies-details.php?user='.$row['user_id'].'"><i class="fa fa-eye"></i></a>

                                                        </div>
                                                    </td> 
                                                    </tr>
                                    '; 
                           }
                           ?>                         
                                                    
                                                
                                             
                                            </table>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>All properties</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            All Properties
                                            <table class="basic-table">
                                                <tr>
                                                    <th>Owner</th>
                                                    <th>Property ID</th>
                                                    <th>Name</th>
                                                    <th> Option </th>
                                                </tr>
                                                   <?php
                           require_once('php/connection.php');
                           $query="SELECT * FROM admin_property WHERE active= 1";
                           $run_query = mysqli_query($conn,$query);
                           while($row = mysqli_fetch_array($run_query))
                           { echo ' <tr>
                                                 
                                                    <td>'.$row['user_name'].'</td>
                                                    <td>'.$row['property_id'].'</td>
                                                    <td>'.$row['property_name'].'</td>
                                                    <td>
                                                        <div class="controller">
                                                            <a href="admin.php?delete='.$row['property_id'].'"><i class="fa fa-trash"></i></a>
                                                            <a href="single-property.php?property='.$row['property_id'].'"><i class="fa fa-eye"></i></a>

                                                        </div>
                                                    </td> 
                                                    </tr>
                                    '; 
                           }
                           ?>                         
                                            </table>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>Change Users Passwords</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            Change Users Passwords
                                            <form method="POST" action="admin.php">
                                                <table class="basic-table">
                                                    <tr>
                                                        <th>User ID</th>
                                                        <th>New Password</th>
                                                        <th>Option</th>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="text" name="user_id" required /></td>
                                                        <td> <input type="password" name="new_password" required /></td>
                                                        <td> <input type="submit" name="change_password" class="btn btn-dark btn-anis" value="Save" /></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--end of button tabs-->
                    </div>
                </div>





            </div>
        </section>
        <!-- END SECTION UI ELEMENT -->

        <!-- START FOOTER -->

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->


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
        <script src="js/slick3.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.barfiller.js"></script>
        <script src="js/barfiller.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/Countdown.min.js"></script>
        <script src="js/ui-lement.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>