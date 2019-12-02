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
                $flag=0;
                $query="select * from posts";
                $select_all_post= mysqli_query($connection, $query);
                while ($row= mysqli_fetch_assoc($select_all_post)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                    $post_status = $row['post_status'];
                    if($post_status=='published'){
                        $flag=1;
                    
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="authors_post.php?author=<?php echo $post_author;?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <div class="thumbnail">
                    <a href="post.php?post_id=<?php echo $post_id?>"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                </div>
                <hr>
                <p style="text-align: justify;"><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                
                <?php }}?>
                <?php
                if($flag==0){
                echo "<h1 class='text-center'>No Post Available</h1>";
                }
                
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include './include/sidebar.php';?>

        </div>
        <!-- /.row -->

<?php include './include/footer.php';?>