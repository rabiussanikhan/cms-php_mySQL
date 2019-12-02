<?php

if(isset($_POST['apply'])&& isset($_POST['checkBoxArray']))
{
    if(isset($_POST['BulkOption']))
    {
        $bulkOption=$_POST['BulkOption'];
        
//        echo $bulkOption."pu";
        if($bulkOption=='published'){
            for($i=0;$i<count($_POST['checkBoxArray']);$i++){
                $post_id = $_POST['checkBoxArray'][$i];
//                echo $post_id;
                $query="update posts set post_status='published' where post_id=$post_id";
                
                $update_res = mysqli_query($connection, $query);
                if(!$update_res){
                    die(" ".mysqli_error($connection));
                }
            }
            
        }
        else if ($bulkOption=='draft'){
            
        }
        else if ($bulkOption=='delete'){                //pending working
            
        }
        else
        {
            echo "<script>alert('Select a option first')</script>";
        }
    }
//    print_r( $_POST['checkBoxArray']);
}
?>


<form action="" method="post">
    <div class="row">
        <div class="col-xs-4">
            <select name="BulkOption" id="" class="form-control">
                <option value="">Select Option</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Apply" name="apply">

    </div>



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>Title</th>
                <th>Post Category ID</th>
                <th>Post Author</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Date</th>
                <th>Operation</th>
                <th>Delete</th>
            </thead>

            <tbody>

                <?php
                                $query="select * from posts";
                                $res = mysqli_query($connection,$query);
                                while ($row= mysqli_fetch_assoc($res)){
                                    $post_id= $row['post_id'];
                                    $post_title= $row['post_title'];
                                    $post_category_id= $row['post_category_id'];
                                    $post_author= $row['post_author'];
                                    $post_date= $row['post_date'];
                                    $post_image= $row['post_image'];
                                    $post_tags= $row['post_tags'];
                                    $post_status= $row['post_status'];
                                    

                                    echo "<tr>";?>
                <td><input type="checkbox" value="<?php echo $post_id?>" name="checkBoxArray[]"></td>
                <?php
                                    echo "<td>$post_id</td>";
                                    echo "<td><a href='../post.php?post_id=$post_id'>$post_title</a></td>";
                                    echo "<td>$post_category_id</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td><img src='../images/$post_image' width='100' height='30' alt='image'></td>";
                                    echo "<td>$post_tags</td>";
                                    
                                    $count_query="select count(comment_post_id) as comment_count from comments where comment_post_id=$post_id";
                                    $count_res= mysqli_query($connection, $count_query);
                                    if(!$count_res){
                                        die(" ".mysqli_error($connection));
                                    }
                                    
                                    $post_comment_count_res= mysqli_fetch_assoc($count_res);
                                    $post_comment_count=$post_comment_count_res['comment_count'];
                                    
                                    echo "<td>$post_comment_count</td>";
                                    echo "<td>$post_status</td>";
                                    echo "<td>$post_date</td>";
                                    echo "<td><a href='post.php?source=edit_post&edit=$post_id'>Edit</a></td>";
                                    echo "<td><a href='post.php?delete=$post_id'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
            </tbody>
        </table>

    </div>
</form>
