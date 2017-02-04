<?php

session_start();
$h = fopen("../module2/users.txt", "r"); //open users.txt for reading only
$line = "";
$read = "";
$_SESSION['username']=$_POST['user']; //convert posted form data to session variable
$location = "../module2/";

// Get the username and make sure it is valid
if( !preg_match('/^[\w_\-\s]+$/', $_SESSION['username']) ){
	echo "Invalid username";
	exit;
}


while( !feof($h) ){ //read users.txt line by line (think: whitelist)
	$line = fgets($h);
	$read = trim($line);
    if($read==($_SESSION['username'])) { 
		$location.=$_SESSION['username'];
		$_SESSION['dir']=$location;
		if (!(file_exists($location) || is_dir($location))) { //if user is registered but lacks a directory, make one
			mkdir($location);
		}
		fclose($h);
		header("Location: home.php"); //redirect to home page to see list of directory contents
		exit;
	}
}
fclose($h);
header("Location: login.html"); //if user not found, redirect back to login page

?>