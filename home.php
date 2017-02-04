<?php

session_start();

//$_SESSION['username'];
$_SESSION['dir'];

$contents = scandir($_SESSION['dir']);

echo "<!DOCTYPE HTML>";
//echo "<html>";
echo "<head>";
echo "<title>File Server User Home Page</title>";
echo "</head>";
echo "<body>";

//echo "<p>";
echo "<table>";
for($i=2; $i<count($contents); ++$i) { //print contents of directory, starting at index 2 to ignore .. and .
    echo "<tr>";
    
    echo "<td>";
    echo(htmlentities($contents[$i])); //next to each file, generate two forms: view and delete buttons
    $_SESSION['files'.$i] = $contents[$i]; //dedicate part of session array to contents of user directory (file2 ... fileN)
    echo "</td>";
    
    echo "<td>";
    echo "<form action='view-file.php' method='POST'>";
    echo "<input type='submit' value='View'>";
    echo "<input type='hidden' name='file' value=$i>"; //send number of file to view code 
    echo "</form>";
    echo "</td>";
    
    echo "<td>";
    echo "<form action='delete-file.php' method='POST'>";
    echo "<input type='submit' value='Delete'>";
    echo "<input type='hidden' name='file' value=$i>"; //send number of file to delete code
    echo "</form>";
    echo "</td>";
    
    echo "</tr>";
}
echo "</table>";
//echo "</p>";

//echo "<br>";

echo "<form enctype='multipart/form-data' action='uploader.php' method='POST'>"; //upload file code, taken from wiki
echo "<p>";
echo "<input type='hidden' name='MAX_FILE_SIZE' value='20000000' />";
echo "<label for='uploadfile_input'>Choose a file to upload:</label> <input name='uploadedfile' type='file' id='uploadfile_input' />";
echo "</p>";
echo "<p>";
echo "<input type='submit' value='Upload File' />";
echo "</p>";
echo "</form>";

echo "<form action='create-new-file.php' method='POST'>"; //upload buttons
echo "New File Name: <input type= 'text' name= 'filename'>";
echo "<br>";
echo "New File Data:<input type= 'text' name= 'filedata'>";
echo "<br>";
echo "<input type='submit' value='Create'>";
echo "</form>"; 

echo "<br>";

echo "<form action='logout.php' method='GET'>"; //logout button redirects to logout (simply destroys session and returns to login)
echo "<input type='submit' value='Logout'>";
echo "</form>";

//echo "</p>";
echo "</body>";
echo "</html>";
?>