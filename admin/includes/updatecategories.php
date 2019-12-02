                        <!--update php code-->
                        
                        <?php
                        
                        if(isset($_POST['UpdateSubmit'])){
                            $update_title=$_POST['cat_update_title'];
                            $query="update categories set cat_title='$update_title' where cat_id=$update_id";
                            $res = mysqli_query($connection,$query);
                            
                            if(!$res){
                                echo 'query failed '. mysqli_error($connection);
                            }
                            else {
                                header("location: categories.php");
                            }   
                        }
                        
                        ?>
                        <!--Update Categories Form-->
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit categories</label>
                                <?php
                                if(isset($_GET['edit'])){
                                    $edit_id = $_GET['edit'];
                                    $query="select * from categories where cat_id=$edit_id";
                                    $res = mysqli_query($connection,$query);
                                    while ($row= mysqli_fetch_assoc($res)){
                                        $title= $row['cat_title'];
                                 ?>
                                
                                <input class="form-control" name="cat_update_title" value="<?php echo $title?>" type="text">
                            <?php }} ?>
                                
                                
                            </div>
                            <div class="form-group">
                                <input class="btn btn-warning" name="UpdateSubmit" type="submit" value="Update Categories">
                            </div>
                        </form>
                        
                        
                        
                        
