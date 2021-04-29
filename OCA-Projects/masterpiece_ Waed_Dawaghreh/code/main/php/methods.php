<?php 
session_start(); 
if(!$_SESSION['auth']) 
{
    header('location:../login.php');
    session_destroy(); 
}
///////////////////////////////
$user_id = $_SESSION['user_id']; 
//////////////////////////////

if(isset($_GET['del'])) {
require_once('connection.php');
$id = $_GET['del']; 
$sql= "DELETE FROM property WHERE property_id = '$id' AND user_id = '$user_id'"; 
if(mysqli_query($conn,$sql))
{
header("location:../my-listings.php?del=deleted");
} 
}
/////////////////////////
    function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));}
////////////////////////
if(isset($_GET['active'])&(!empty($_GET['property']))) {
require_once('connection.php');
$p_id= $_GET['property'];
$status = $_GET['active']; 
$sql= "UPDATE property SET active = '$status' WHERE property_id= '$p_id' AND user_id= '$user_id'"; 
if(mysqli_query($conn,$sql))
{
header("location:../my-listings.php?status=$status");
} 
}

/////////////////////////
if(isset($_POST['tour_submit']))
{
require_once('connection.php');
   $time_added = date("Y-m-d h:i:sa");
   $time  =   $_POST['t_time'];
   $date  =   $_POST['t_date'];
   $adults=  inject_checker($conn, $_POST['t_adults']);
   $childs=  inject_checker($conn, $_POST['t_childs']);
   $p_user=  inject_checker($conn, $_POST['t_owner']);
   $p_id  =  inject_checker($conn, $_POST['p_id']);
   $query="SELECT * FROM toure_sqedual WHERE user_id=$user_id AND date='$date'";
     $result=mysqli_query($conn,$query);
     if ($result->num_rows > 0) {
      header("location:../single-property.php?property=$p_id&same_day=!");
     } else {              
$sql ="INSERT INTO toure_sqedual (user_id, p_user,	property_id,	date,	time,	toure_status,	adults,	childs, time_added) 
VALUES ('$user_id','$p_user','$p_id','$date','$time','On Hold' ,'$adults', '$childs', '$time_added')";
if(mysqli_query($conn,$sql))
{ 
    $status="!";
header("location:../single-property.php?property=$p_id&status=$status");
} }
}

/////////////////////////
if(isset($_GET['accept']))
{
require_once('connection.php');
   $time_added = date("Y-m-d h:i:sa");
   $accept_status  =  inject_checker($conn, $_GET['accept']);
   $toure_id       =  inject_checker($conn, $_GET['toure_id']);
   $query="";
   if($accept_status=='yes'){
   $query="UPDATE toure_sqedual SET toure_status ='Accepted' WHERE p_user='$user_id' AND toure_id='$toure_id' ";
   }
   if($accept_status=='no'){
   $query="UPDATE toure_sqedual SET toure_status ='Canceled' WHERE toure_id='$toure_id'";
   }
     if($accept_status=='delete'){
   $query="DELETE FROM toure_sqedual WHERE user_id='$user_id' AND toure_id='$toure_id'";
   }
     $result=mysqli_query($conn,$query);
     if ($result) {
      header("location:../dashboard.php?status=1");
     }
}
if(isset($_POST['review_submit']))
{
require_once('connection.php');
   $property_id       =  inject_checker($conn, $_POST['property_id']);
   $review_desc       =  inject_checker($conn, $_POST['review_desc']);
   $rating            =  inject_checker($conn, $_POST['final_rate']);
   $query="INSERT INTO review (user_id, property_id, review_desc, rating) VALUES ('$user_id', '$property_id', '$review_desc', '$rating')";
     $result=mysqli_query($conn,$query);
     if ($result) {
      header("location:../single-property.php?property=$property_id&review=1");
     }
}
if(isset($_GET['del_review']))
{
require_once('connection.php');
   $review_id         =  inject_checker($conn, $_GET['del_review']);
      $property_id         =  inject_checker($conn, $_GET['property']);

   $query="DELETE FROM review WHERE review_id = $review_id AND $user_id = $user_id";
     $result=mysqli_query($conn,$query);
     if ($result) {
      header("location:../single-property.php?property=$property_id&review=0");
     }
}
if(isset($_POST['change-p-submit']))
{
require_once('connection.php');
   $old_password                    =  base64_encode(inject_checker($conn, $_POST['current-password']));
   $new_password                    =  base64_encode(inject_checker($conn, $_POST['new-password']));
   $confirm_new_password            =  base64_encode(inject_checker($conn, $_POST['confirm-new-password']));
   $query="UPDATE user SET user_password = '$new_password' WHERE user_id='$user_id' AND user_password='$old_password'";
    if($new_password == $confirm_new_password){
     $result=mysqli_query($conn,$query);
     if ($result) {
      header("location:../change-password.php?status=changed");
     }
    
    else {
              header("location:../change-password.php?status=error");
    } 
        
    }
    else {echo 'error';}
}

?>