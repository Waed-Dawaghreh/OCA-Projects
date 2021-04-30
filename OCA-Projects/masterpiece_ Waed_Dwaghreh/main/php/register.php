<?php 
session_start(); 
require_once("connection.php");
function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));
}
$date = date('d/m/Y');
if(isset($_POST['reg_btn'])){
//////////////////////////////////
$reg_name = inject_checker($conn, ucwords($_POST['name']));
$reg_email = inject_checker($conn, strtolower($_POST['email']));
$reg_password1 = inject_checker($conn, $_POST['password1']);
$reg_password2 = inject_checker($conn, $_POST['password2']);
$reg_phone = inject_checker($conn, $_POST['phone']);
/////////// 
if($reg_password1 !== $reg_password2){
$error_msg = "Password Do not Match";
header("location:../register.php?error_msg=$error_msg"); 
}
else{
$query = " SELECT * FROM user WHERE user_email = '$reg_email' ";
$run_query = mysqli_query($conn, $query);
if(mysqli_num_rows($run_query) > 0){
$error_msg = "Error: This User Alreaddy Exist";
header("location:../register.php?error_msg=$error_msg"); 
}else{
 $reg_password1 =  base64_encode($reg_password1);
$query = " INSERT INTO user(user_name, user_email, user_password, user_phone)
VALUES('$reg_name', '$reg_email', '$reg_password1', '$reg_phone')";
$run_query = mysqli_query($conn, $query);
if($run_query == true){
    $error_msg="You have been registered Successfully <br> <strong> Please Login To Continue </strong>"; 
header("location:../login.php?Invalid=$error_msg");
}else{
$error_msg = " Registration Failed!";
header("location:../register.php?error_msg=$error_msg"); 
}
}
}
}
?> 