<?php include "includes/header.php"; ?>
<?php include "../includes/db.php"; ?>

   
    <div id="wrapper">

        <!-- Navigation -->
        
       
         <?php include "includes/navigation.php"; ?>
        
            <div id="page-wrapper">

            <div class="container-fluid">

                
        <h1 class="page-header">
            Welcome to Admin
            <small>Bobo</small>
        </h1>        
                
   <?php 
                
               if(isset($_GET['source'])){
                   
                   $source = $_GET['source'];
               }else{
                   $source = '';
               } 
                
                
            switch($source){
                    case 'add_posts';
                    include "add_posts.php";
                    break;
                    case 'edit_post';
                    include "edit_post.php";
                    break;
                    case '200';
                    echo "NICE 200";
                    break;
                default:
                    include "view_all_comments.php";
                break;    
            }    
                
                ?>
                        
                     
               
                        
   <?php include "includes/footer.php"; ?>    