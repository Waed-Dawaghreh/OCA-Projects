<?php
$servername = "localhost";
$username = "muhamma3_morabi";
$password = "kennen99*rumble";
$database = "muhamma3_dream_home"; 
// Create connection
$conn = new mysqli($servername, $username, $password , $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>