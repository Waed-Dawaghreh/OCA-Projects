<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['login']))
    {
       $password = base64_encode($_POST['password']);
                $query="SELECT * FROM user WHERE user_email='".$_POST['email']."' AND user_password='".$password."'";
                 $result=mysqli_query($conn,$query);
                   if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {  
                     $_SESSION['user_id']  = $row['user_id'];
                     $_SESSION['username'] = $row['user_name'];
                     $_SESSION['email']    = $row['user_email'];
                     $_SESSION['image']    = $row['user_image'];
                     $_SESSION['phone']    = $row['user_phone'];
                     $_SESSION['location'] = $row['user_address'];
                     $_SESSION['desc']     = $row['user_desc'];    
                     $_SESSION['auth']     = true; 
                     header("location:../index.php");
                     $conn->close(); 
                }}
                else
                {
                    header("location:../login.php?Invalid= Incorrect Username or Password ");
                }
            }

    else
    {
        echo 'Not Working Now Guys';
    }



?>