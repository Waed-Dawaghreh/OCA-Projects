<?php
session_start();

require_once('connection.php');
  if(isset($_POST['admin']))
    {
                $query="SELECT * FROM Admin WHERE admin_email='".$_POST['email']."' AND admin_password='".$_POST['password']."'";
                 $result=mysqli_query($conn,$query);
                   if ($result->num_rows > 0) {
                       $_SESSION['admin'] = true; 
                    header("location:../admin.php");
                   }
                else
                {
                    header("location:../admin-login.php?Invalid= Incorrect Username or Password ");
                }
            }

    else
    {
        echo 'Not Working Now Guys';
    }
?>