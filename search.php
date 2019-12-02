<?php include './include/DB.php';
$connection = DBconnect();
?>
    <!--header-->
<?php include './include/header.php';?>
    <!-- Navigation -->
<?php include  './include/navigation.php';?>

<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['search'])){
            $search_item = $_POST['search'];
//            echo $search_item;
//            if(!$search_item){
//                echo '<script>window.alert("Fill the feild");</script>';
//                
//            }
            $query="select * from posts where post_tags like '%$search_item%' or post_author like '%$search_item%' or post_title like '%$search_item%'";
            $search_result = mysqli_query($connection, $query);
            if (!$search_result){
                die("Query Failed". mysqli_error($connection));
            }
            $count= mysqli_num_rows($search_result);
        }
    }
?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                if($count==0){
                echo '<pre class="text-center">No result</pre>';
                }
                while ($row= mysqli_fetch_assoc($search_result)){
                    $post_id=$row['post_id'];
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
                    <a href="post.php?post_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="authors_post.php?author=<?php echo $post_author;?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <div class="thumbnail">
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </div>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php }?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include './include/sidebar.php';?>
        </div>
        <!-- /.row -->
<?php include './include/footer.php';?>