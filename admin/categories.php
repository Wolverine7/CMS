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
        
         
        
            <div class="col-xs-6">
                        <form action="" method="post">
                        
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add a category">
                            </div>
                        </form>
                        </div> 
                        
                        
                        
                    <!--Add Category Item -->    
                              
                <?php 
                    
                    $query = "SELECT * FROM category";
                    $select_categories = mysqli_query($connection, $query);
                    $add_query = "INSERT INTO category";
                    $add_category = mysqli_query($connection, $add_query);
                        
                        
                        if(isset($_POST['submit'])){
                            
                            $cat_title = $_POST['cat_title'];
                            
                            if($cat_title == "" || empty($cat_title)){
                                echo "This field cannot be empty";
                            }else{
                                $query_category ="INSERT INTO category(cat_title) ";
                                $query_category .="VALUE('{$cat_title}') ";
                                
                                $create_category_query = mysqli_query($connection, $query_category);
                                
                                if(!$create_category_query){
                                    die('Query Failed' . mysqli_error($connection));
                                }
                                header("Location: categories.php");
                            }
                        }
                        
                    ?>        
                        
                        <div class="col-xs-6">
                           <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Categories</th>
                                    </tr>
                               </thead>
                               <tbody>
                                   
                 <!--Delete Category Item -->                   
                                   
                <?php 
                        while($row = mysqli_fetch_assoc($select_categories)){
                            $cat_id =$row['cat_id'];
                            $cat_title = $row['cat_title'];
                            
                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
                            echo "</tr>";
                        }         
                                   
                      
                                   ?>  
                                   
                <?php
                        if(isset($_GET['delete'])){
                            
                            $the_cat_id = $_GET['delete'];
                            
                            $query = "DELETE FROM category WHERE cat_id ={$the_cat_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: categories.php");
                        }           
                                   
                                   
                                   ?>
                                   
                                 
                    
                               </tbody>
                            </table>
                               
                        </div>
                        
                        <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                
                                include "includes/update_categories.php";
                            }
                        ?>
                        
   <?php include "includes/footer.php"; ?>     
