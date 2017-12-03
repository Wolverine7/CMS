<?php 

    function confirmQuery($result){
        
        global $connection;
        
        if(!result){
            die("QUERY FAiled . ". mysqli_error($connection));
        }
    }

?>
    