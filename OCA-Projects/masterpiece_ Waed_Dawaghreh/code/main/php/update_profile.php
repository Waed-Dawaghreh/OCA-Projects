<?php 
session_start(); 
if(!$_SESSION['auth']) 
{
    header('location:../login.php');
    session_destroy(); 
}
$images_identifier = rand(). date("his");

if(isset($_POST['profile-submit'])){
require_once('connection.php');
function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));}
                           $user_id             = $_SESSION['user_id']; 
                           $name                = inject_checker($conn, $_POST['name']);
                           $desc                = inject_checker($conn,$_POST['desc']); 
                           $address             = inject_checker($conn,$_POST['address']);
                           $phone               = inject_checker($conn,$_POST['phone']);
                           $email               = inject_checker($conn,$_POST['email']);
     $query = "UPDATE user SET ";
    $conditions = array();
    if(! empty($name)) {
      $conditions[] = "user_name='$name'";
    }
    if(! empty($desc)) {
      $conditions[] = "user_desc='$desc'";
    }
    if(! empty($address)) {
      $conditions[] = "user_address='$address'";
    }
       if(! empty($phone)) {
      $conditions[] = "user_phone='$phone'";
    }     if(! empty($email)) {
      $conditions[] = "user_email='$email'";
    }
    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= implode(',', $conditions);
      $sql .= "WHERE user_id=" . $user_id ; 
    }
       $run_query = mysqli_query($conn, $sql);
      if($run_query) {
      header('location:../user-profile.php?success="Updated Successfully!"');
    }
    else {
     header('location:../user-profile.php?success="Nothing Changed!"');

    }
} 

if(isset($_POST['pic-submit'])){
    $i = rand(). date("his");
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
                                                                  header('location:../user-profile.php?success="Updated Successfully!"');
                                                                  }
                                                          } else {
                                                            echo "failed";
                                                          }
                                                        }
         
          

}  

?>