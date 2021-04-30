<?php 
session_start(); 
if(!$_SESSION['auth']) 
{
    header('location:../login.php');
    session_destroy(); 
}
$user_id= $_SESSION['user_id'];
/////////////////////////////////EDIT PROPERTY 
if(isset($_POST['edit-pro-submit'])){
require_once('connection.php');
function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));}
                           $p_id                   = inject_checker($conn, $_POST['pro-id']);
                           $pro_name               = inject_checker($conn, $_POST['pro-name']);
                           $pro_desc               = inject_checker($conn,$_POST['pro-desc']); 
                           $pro_age                = inject_checker($conn,$_POST['pro-age']);
                           $pro_area               = inject_checker($conn,$_POST['pro-area']);
                           $pro_price              = inject_checker($conn,$_POST['pro-price']); 
                           $pro_longitude          = inject_checker($conn,$_POST['pro-longitude']);
                           $pro_latitude           = inject_checker($conn,$_POST['pro-latitude']); 
                           $pro_address            = inject_checker($conn,$_POST['pro-address']);
                           $pro_bathrooms          = inject_checker($conn,$_POST['pro-bathrooms']);
                           $pro_bedrooms           = inject_checker($conn,$_POST['pro-bedrooms']);
                           $pro_city               = inject_checker($conn,$_POST['pro-city']);
                           $pro_type               = inject_checker($conn,$_POST['pro-type']); 
                           $pro_status             = inject_checker($conn,$_POST['pro-status']);
    $query ="UPDATE property SET 
    city_id = '$pro_city' ,
    property_name = '$pro_name',
    property_desc = '$pro_desc',
    property_status = '$pro_status',
    property_type ='$pro_type' ,
    property_bedrooms = '$pro_bedrooms',
    property_bathrooms = '$pro_bathrooms',
    property_price = '$pro_price',
    property_area_size = '$pro_area',
    building_age = '$pro_age' ,
    address = '$pro_address' ,
    longitude ='$pro_longitude' ,
    latitude = '$pro_latitude'
    WHERE user_id = '$user_id' AND property_id = '$p_id'";
     $run_query=mysqli_query($conn,$query);
     if($run_query){
         header("location:../my-listings.php?updated=yes");
     }
     else 
     {
                  header("location:../my-listings.php?updated=no");

     }
  
}
?>