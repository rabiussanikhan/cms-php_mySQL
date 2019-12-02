<?php include './includes/admin_header.php';?>
    <div id="wrapper">

<?php include './includes/admin_navigation.php';?>

<?php
                         if(isset($_GET['delete'])){
                             $delete_id = $_GET['delete'];
                             $query="delete from posts where post_id={$delete_id}";
                             mysqli_query($connection, $query);
                             header("location: post.php?source=");
                             
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
                            include './includes/view_all_post.php';
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