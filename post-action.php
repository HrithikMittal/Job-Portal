<?php
session_start();
 
include ("dbconnect.php");
 
if (isset($_POST['post'])) {
   
$userid= $_SESSION['usr_id'];
    
 
$post_msg = $_POST['post_msg'];
 
$post_title  =  $_POST['post_title'];
 
$post = mysqli_query($con,"INSERT INTO posts (usr_id,post_msg, post_title) VALUES ('" . $userid . "','" . $post_msg . "', '" . $post_title . "')");
 
if ($post) {
 
header("Location: dashboard.php");
 
} else {
 
echo $mysqli->error;
 
}
 
}
 
?>