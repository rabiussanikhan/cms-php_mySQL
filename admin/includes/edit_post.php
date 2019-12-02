
                        <?php
                        if(isset($_GET['edit'])){
                            $update_id=$_GET['edit'];
                            $query="select * from posts WHERE post_id=$update_id";
                                $res = mysqli_query($connection,$query);
                                $row= mysqli_fetch_assoc($res);
                                    $post_id= $row['post_id'];
                                    $post_title= $row['post_title'];
                                    $post_category_id= $row['post_category_id'];
                                    $post_author= $row['post_author'];
                                    $post_date= $row['post_date'];
                                    $post_image= $row['post_image'];
                                    $post_tags= $row['post_tags'];
                                    $post_status= $row['post_status'];
                                    $post_content= $row['post_content'];
                             
                        }
                        ?>

                        <?php
                        if(isset($_POST['updatepost'])){
                            
                       
                        
                            $title=$_POST['title'];
                            $category_id=$_POST['category'];
                            $author=$_POST['author'];
                            $status=$_POST['status'];

                            $image=$_FILES['image']['name'];
                            $image_temp=$_FILES['image']['tmp_name'];

                            $tags=$_POST['tags'];
                            $content=$_POST['content'];

                            move_uploaded_file($image_temp,"../images/$image");
                            
                            if(empty($image)){
                                $query="select * from posts WHERE post_id=$update_id";
                                $res = mysqli_query($connection,$query);
                                $row= mysqli_fetch_assoc($res);
                                    $image= $row['post_image'];
                            }
                            
                            $query="update posts set";
                            $query.=" post_title='$title'";
                            $query.=", post_category_id=$category_id";
                            $query.=", post_author='$author'";
                            $query.=", post_status='$status'";
                            $query.=", post_image='$image'";
                            $query.=", post_tags='$tags'";
                            $query.=", post_content='$content'";
                            $query.=" where post_id=$update_id";
                            $result= mysqli_query($connection, $query);
                            if(!$result){
                                die('QUERY FAILED '.mysqli_error($connection));
                            }
                            else {
                                header("location:post.php?source=");
                            }

                        }
                        ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title;?>" id="title" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="category">Post Category</label>
        <select class="form-control" name="category" id="category">
            <?php
            $query="select * from categories";
            $res = mysqli_query($connection,$query);
            while ($row= mysqli_fetch_assoc($res)){
                $title= $row['cat_title'];
                $id=$row['cat_id'];
                if($id==$post_category_id){
                    echo "<option value='$id' selected>$title</option>";
                }else{
                echo "<option value='$id'>$title</option>";
                }
            }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $post_author;?>" id="author" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="status" id="status" class="form-control">
            <option value="<?php echo $post_status?>"><?php echo $post_status?></option>
            
            <?php
                if($post_status=='draft')
                {
                    echo '<option value="published">published</option>';
                }
                else
                {
                    echo '<option value="draft">draft</option>';
                }
            ?>
        </select>
        
    </div>
    <label for="image">Post Image</label>
    <div class="form-group">
        <img src="../images/<?php echo $post_image?>" width="100" alt="image">
        
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags;?>" class="form-control" id="tags" name="tags">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" id="content" name="content" rows="10"><?php echo $post_content;?></textarea>
    </div>
    <input type="submit" class="btn btn-warning" name="updatepost" value="UPDATE">
</form>
                 