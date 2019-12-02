
                        <?php
                        if(isset($_POST['addpost'])){
                            $title=$_POST['title'];
                            $category_id=$_POST['category'];
                            $post_author=$_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
                            
                            $status=$_POST['status'];

                            $image=$_FILES['image']['name'];
                            $image_temp=$_FILES['image']['tmp_name'];

                            $tags=$_POST['tags'];
                            $content=$_POST['content'];
                            $date= date("d-m-y");

                            move_uploaded_file($image_temp,"../images/$image");
                            
                            $query="insert INTO posts(post_title,post_category_id,post_author,post_status,post_date,post_image,post_tags,post_content) ";
                            $query.="Values('$title',$category_id,'$post_author','$status',now(),'$image','$tags','$content')";
                            $result= mysqli_query($connection, $query);
                            if(!$result){
                                die('QUERY FAILED '.mysqli_error($connection));
                            }
                            header("location:post.php?source=");
                            echo 'lolshdfsdflkskfhsifushd';
 
                        }
                        ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" id="title" class="form-control" name="title">
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
                echo "<option value='$id'>$title</option>";
            }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <?php
        $author=$_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
        ?>
        <input type="text" id="author" class="text-warning form-control" value="<?php echo $author;?>" disabled="">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="status" id="status" class="form-control">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Post image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" id="tags" name="tags">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
    </div>
    <input type="submit" class="btn btn-success" name="addpost" value="Add Post">
</form>
                 