<?php
session_start();
require_once 'db.php';
require_once 'init.php';
$username = $_SESSION['username'];

 // Create database connection
 $db = mysqli_connect("localhost", "root", "", "codebetter");

 // Initialize message variable
 $msg = "";

 // If upload button is clicked ...
 if (isset($_POST['upload'])) {
     // Get image name
     $image = 'imgs/'.$_FILES['image']['name'];

     // image file directory
     $target = "../imgs/".basename($image);

     $sql = "UPDATE users SET image='$image' WHERE username='$username'";
     // execute query
     mysqli_query($db, $sql);

     if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
         header("location:../profile.php");
     }else{
         $msg = "Failed to upload image";
         header("location:../profile.php");

     }
 }


?>