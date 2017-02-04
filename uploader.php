<?php
session_start();
    $username = $_SESSION['username'];

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-\s]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
 
// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-\s]+$/', $username) ){
	echo "Invalid username";
	exit;
}
 
$full_path = sprintf("../module2/%s/%s", $username, $filename);
 
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: home.php");
	exit;
} else{
	header("Location: upload_failure.html");
	exit;
}
 
?>