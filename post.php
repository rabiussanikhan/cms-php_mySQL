<?php include './include/DB.php';
$connection = DBconnect();
?>
    <!--header-->
<?php include './include/header.php';?>
    <!-- Navigation -->
<?php include  './include/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                if(isset($_GET['post_id'])){
                    $p_id=$_GET['post_id'];
                $query="select * from posts WHERE post_id=$p_id";
                $select_all_post= mysqli_query($connection, $query);
                while ($row= mysqli_fetch_assoc($select_all_post)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                
                    ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $p_id?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="authors_post.php?author=<?php echo $post_author;?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <div class="thumbnail">
                    <a href="post.php?post_id=<?php echo $p_id?>"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                </div>
                <hr>
                <p style="text-align: justify;"><?php echo $post_content ?></p>
                

                <hr>
                <?php }}?>
                <!-- Blog Comments -->
                <?php
                
                if(isset($_POST['comment_submit'])){
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $query = "insert INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date,comment_likes) ";
                    $query.= "values($p_id,'$comment_author','$comment_email','$comment_content','Disapproved',now(),0)";
                    $result= mysqli_query($connection, $query);
                    if(!$result){
                        die("QUERY FAILED ". mysqli_error($connection));
                    }
                        
                }
                ?>
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="comment_author">Author :</label>
                            <input type="text" class="form-control" id="comment_author" name="comment_author" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email :</label>
                            <input type="email" class="form-control" id="comment_email" name="comment_email" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comment :</label>
                            <textarea id="comment_content" class="form-control" rows="5" name="comment_content" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </form>
                </div>

                <hr>
                

                <!-- Posted Comments -->
                <?php
                
                $comment_query="select * from comments WHERE comment_post_id=$p_id and comment_status='Approved'";
                $select_all_comments= mysqli_query($connection, $comment_query);
                if(!$select_all_comments){
                    die("Query Failed ". mysqli_error($connection));
                }
                while ($comments= mysqli_fetch_assoc($select_all_comments)){
                    $comment_id = $comments['comment_id'];
                    $comment_author = $comments['comment_author'];
                    
                    $comment_date = $comments['comment_date'];
                    $comment_content = $comments['comment_content'];
                    $comment_email = $comments['comment_email'];
                    ?>
                

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                    </div>
                    
                </div><hr>
                <?php } ?>

            </div>
            
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include './include/sidebar.php';?>

        </div>
        <!-- /.row -->

<?php include './include/footer.php';?>
                