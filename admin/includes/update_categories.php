<div class="col-xs-6">
                        <form action="" method="post">
                        
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>
                                
                    <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                
                                $query_edit = "SELECT * FROM category WHERE cat_id = $cat_id ";
                                $edit_query = mysqli_query($connection, $query_edit);
                                
                                while($row = mysqli_fetch_assoc($edit_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    
                                    ?>
                        
                        
                            <input value = "<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat-title">
                        
                                <?php }} ?>
                            
                    <?php //Update Query
                            if(isset($_POST['update_category'])){
                            
                            $cat_title = $_POST['cat_title'];
                                echo "$cat_title";
                            
                            $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id ={$cat_id} ";
                            $update_query = mysqli_query($connection, $query);
                            
                                if(!$update_query){
                                    die("Failed query" . mysqli_error($connection));
                                    echo "<td>{$cat_title}</td>";
                                }
                        }       
                                ?>
                           
                               
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update category">
                            </div>
                        </form>
                        </div> 