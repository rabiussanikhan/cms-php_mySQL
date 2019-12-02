<?php include './includes/admin_header.php';?>
    <div id="wrapper">

<?php include './includes/admin_navigation.php';?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>
                                <?php echo $_SESSION['user_firstname']." ".$_SESSION['user_lastname'];?>
                            </small>
                        </h1>
                    </div>
                </div>
                
                <!-- /.row -->
                
                
                       
                <!-- /.row -->
                
                <?php
                    if($_SESSION['user_role']==='Admin'){
                        include 'includes/admin_dashboard.php';
                    }
                    else {
                        include 'includes/subscriber_dashboard.php';
                    }
                    ?>
                
                
                
                <!-- /.row -->
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include './includes/admin_footer.php';?>