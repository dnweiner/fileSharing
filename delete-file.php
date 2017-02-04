<?php

    session_start();
    $username = $_SESSION['username'];
    $j = $_POST['file'];
    $file = $_SESSION['files'.$j]; 
    
    unlink("../module2/".$username."/".$file);
    header("Location: home.php");
?>