<?php

session_start();
$h = fopen("../module2/users.txt", "a+"); //open users.txt to append a new user
$line = "";
$read = "";
$_SESSION['username']=$_POST['newuser']; //convert posted form data into a session variable
$location = "../module2/";

fwrite($h, "\n".$_SESSION['username']); //add new user to end of users.txt
fclose($h);

$readHandle = fopen("../module2/users.txt", "r"); //reopen users.txt to read

while( !feof($readHandle) ){ //read file one line at a time
	$line = fgets($readHandle);
	$read = trim($line);
    if($read==htmlentities($_SESSION['username'])) {
		$location.=$_SESSION['username'];
		$_SESSION['dir']=$location;
		if (!(file_exists($location) || is_dir($location))) { //confirm that no folders or files currently use this name/path
			mkdir($location); //create a new directory for this new user
		}
        fclose($readHandle);
		header("Location: home.php"); //redirect to home page to see list of directory contents and choose further action
		exit;
	}
}
fclose($readHandle);
header("Location: login.html"); //if the targeted user is never found, redirect to login page

?>