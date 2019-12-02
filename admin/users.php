<?php include './includes/admin_header.php';?>
    <div id="wrapper">

<?php include './includes/admin_navigation.php';?>

<?php
                         if(isset($_GET['user_delete'])){
                             $delete_id = $_GET['user_delete'];
                             $query="delete from users where user_id={$delete_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: users.php?source=");
                             
                         }
                         if(isset($_GET['change_to_admin'])){
                             $u_id = $_GET['change_to_admin'];
                             $query="update users set user_role = 'Admin' where user_id={$u_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: users.php?source=");
                             
                         }
                         
                         if(isset($_GET['change_to_subscriber'])){
                             $u_id = $_GET['change_to_subscriber'];
                             $query="update users set user_role = 'Subscriber' where user_id={$u_id}";
                             $result=mysqli_query($connection, $query);
                             if(!result){
                                 die("QUERY FAILED! ".mysqli_error($connection));
                             }
                             header("location: users.php?source=");
                             
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
                        case 'edit_user';
                            include './includes/edit_user.php';
                            break;
                        case 'add_user';
                            include './includes/add_user.php';
                            break;
                        case 'profile';
                            include './includes/admin_profile.php';
                            break;
                        default :
                            include './includes/view_all_users.php';
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