<?php include "includes/header.php"; ?>
<?php include "../includes/db.php"; ?>


   
    <div id="wrapper">

        <!-- Navigation -->
        
       
         <?php include "includes/navigation.php"; ?>
        
            <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin

                            <small>Admin</small>
                        </h1>
        

<form action="" method="post" enctype="multipart/form-data">

    

    <div class="form-group">
        
        <select name="" id="">
        
<?php 
        if(isset($_GET['p_id'])){
            $post_id = $_GET['p_id'];
        }    
            
    $query_edit = "SELECT * FROM posts WHERE post_id = {$post_id}";
        $edit_query = mysqli_query($connection, $query_edit);
                                
            while($row = mysqli_fetch_assoc($edit_query)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
             
                echo "<option value=''>{$cat_id}</option>";
                
            }
            
          if(isset($_POST['update_post'])){
                $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_category_id = $row['post_category_id'];
              
              $query = "UPDATE posts SET ";
              $query .= "post_title = '{$post_title}', ";
              $query .= "post_date = now(), ";
              $query .= "post_status = '{$post_status}', ";
              $query .= "post_tags = '{$post_tags}', ";
              $query .= "post_author = '{$post_author}', ";
              $query .= "WHERE post_id = '{$post_id}', ";
              
              $update_query = mysqli_query($connection, $query);
            }
            
          
            
?>
        
        </select>
    </div>
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    
    <div class="form-group">
        <select name="post_category" id="">
        
<?php
            
        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($connection, $query);
                           
        while($row = mysqli_fetch_assoc($select_categories)){
              $cat_id = $row['cat_id'];
              $cat_title = $row['cat_title'];  
            
            echo "<option value ='$cat_id'>{$cat_title}</option>";
        }   
?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
    
    
    
    <div class="form-group">
        <label for="title">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
    
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" name="post_category_id">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
    </div>
    
</form>
                        
<?php include "includes/footer.php"; ?>    