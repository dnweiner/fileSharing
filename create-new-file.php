<?php
    session_start();
    
    $username = $_SESSION['username'];
    $new_file = $_POST['filename'];
    $data = $_POST['filedata'];
    
    $newfile_path = "../module2/".$username."/".$new_file;
    
    if(is_file($newfile_path)) {
        printf("ERROR: File %s already exists", $new_file);
        header("Location: home.php");
    }
    else {
        $handle = fopen($newfile_path, 'w');
        if(is_null($data)) {
            break;
        }
        else {
          fwrite($handle, $data);  
        }
        header("Location: home.php");
    }

?>