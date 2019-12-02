<?php include './includes/admin_header.php';?>
    <div id="wrapper">

<?php include './includes/admin_navigation.php';?>

<?php
                         if(isset($_GET['comment_delete'])){
                             $delete_id = $_GET['comment_delete'];
                             $query="delete from comments where comment_id={$delete_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: comments.php?source=");
                             
                         }
                         if(isset($_GET['approve'])){
                             $comment_id = $_GET['approve'];
                             $query="update comments set comment_status = 'Approved' where comment_id={$comment_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: comments.php?source=");
                             
                         }
                         if(isset($_GET['disapprove'])){
                             $comment_id = $_GET['disapprove'];
                             $query="update comments set comment_status = 'Disapproved' where comment_id={$comment_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: comments.php?source=");
                             
                         }
                         
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['user_firstname']." ".$_SESSION['user_lastname'];?></small>
                        </h1>
                        <?php
                        if(isset($_GET['source'])){
                            $source=$_GET['source'];
                        switch ($source){
                        case 'edit_post';
                            include './includes/edit_post.php';
                            break;
                        case 'add_post';
                            include './includes/add_post.php';
                            break;
                        default :
                            include './includes/view_all_comments.php';
                            break;
                        }
                        
                        }
                        
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include './includes/admin_footer.php';?>