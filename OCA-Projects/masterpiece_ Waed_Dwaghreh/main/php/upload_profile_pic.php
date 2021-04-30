<?php 
 session_start(); 
if(!$_SESSION['auth']) 
{
    header('location:../login.php');
    session_destroy(); 
}

if(isset($_POST['pic-submit'])){
    $i = rand();
require_once('connection.php');
                            $url = ""; 
                            $target_dir = __DIR__ . '/uploads/';
                            $target_file = $target_dir .$i .basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                          if($check !== false) {
                                                            $uploadOk = 1;
                                                          } else {
                                                            echo "الملف ليس صورة .";
                                                            $uploadOk = 0;
                                                          }
                                                
                                                        // Allow certain file formats
                                                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                                        && $imageFileType != "gif" ) {
                                                          $uploadOk = 0;
                                                        }
                                                       else {
                                                          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                              $url = $i;
                                                              $url .=$_FILES["fileToUpload"]["name"]; 
                                                               $user_id= $_SESSION['user_id'];                                                 
                                                                  $query = "UPDATE user SET user_image = '$url' WHERE user_id = '$user_id'";
                                                                  if(mysqli_query($conn,$query)) 
                                                                  {
                                                                  header('location:../user-profile.php?success="Image Updated Successfully!"');
                                                                  }
                                                          } else {
                                                            echo "failed";
                                                          }
                                                        }
         
          

}  
?>