<?php 

    $hs = "localhost";
    $username = "root";
    $pwd = "";
    $db = "CMS";
    
    $connection = mysqli_connect($hs, $username, $pwd, $db);

    if(!$connection){
        echo "Error";
    }
?>