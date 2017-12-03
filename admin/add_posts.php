<?php include "includes/header.php"; ?>
<?php include "../includes/db.php"; ?>


   <?php 

    if(isset($_POST['create_post'])){
        
        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;
        
        $query = "INSERT INTO posts(post_title, post_author, post_category_id, post_status, post_tags, post_content, post_date, post_comment_count)";
        $query .= " VALUES('{$post_title}', '{$post_author}', {$post_category_id}, '{$post_status}', 
        '{$post_tags}', '{$post_content}', now(), '{$post_comment_count}' ) ";
        
        $create_post_query = mysqli_query($connection, $query);
    }

    if(isset($_POST['update_post'])){
        echo "Hi";
    }
?>
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
        

<form action="add_posts.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
    
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
    
</form>
                        
<?php include "includes/footer.php"; ?>    