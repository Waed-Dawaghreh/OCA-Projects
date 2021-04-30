<?php 
session_start(); 
if(!$_SESSION['auth']) 
{
    header('location:../login.php');
    session_destroy(); 
}
    $images_identifier = rand(). date("his");

if(isset($_POST['pro-submit'])){
require_once('connection.php');
function inject_checker ($conn, $field){
return (htmlentities(trim(mysqli_real_escape_string($conn, $field))));}
                           $user_id                = $_SESSION['user_id']; 
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
                           $pro_active             = 0; 
    $query ="INSERT INTO property ( user_id, 	city_id,	property_name,	property_desc,	property_status,	active,	property_type,	image_identifier,	property_bedrooms,	property_bathrooms,	property_rooms,	property_features,
    property_price,	property_area_size,	building_age,	address,	longitude,	latitude) VALUES ( ' $user_id ' , '$pro_city' , '$pro_name' ,'$pro_desc' , '$pro_status' ,'$pro_active' ,'$pro_type' ,'$images_identifier' ,'$pro_bedrooms' ,'$pro_bathrooms' ,'$pro_bedrooms' ,'123' ,'$pro_price' ,'$pro_area' ,'$pro_age' ,'$pro_address' ,'$pro_longitude' ,'$pro_latitude')";
    if(mysqli_query($conn,$query)){
    $error_msg="You have been registered Successfully <br> <strong> Please Login To Continue </strong>"; 
    }
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif', 'jfif'); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir .$images_identifier. $fileName; 
             
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    $insertValuesSQL .= "('".$images_identifier."','".$images_identifier.$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            $insert = $conn->query("INSERT INTO property_images (image_identifier,	image_name,	uploaded_on) VALUES $insertValuesSQL"); 
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
header("location:../my-listings.php?success=$pro_name");
} 

  
?>



