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
                            <small><?php echo $_SESSION['user_firstname']." ".$_SESSION['user_lastname'];?></small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        
                        <?php
                            if(isset($_POST['SUBMIT'])){
                                $cat_title = $_POST['cat_title'];
                                if(!$cat_title){
                                    echo "<script>window.alert('This field should not be empty')</script>";
                                }
                                else {
                                    $query="insert into categories(cat_title) VALUES('$cat_title')";
                                    $result= mysqli_query($connection, $query);
                                    if(!$result){
                                        die('Query failed'.mysqli_error($connection));   
                                    }
                                }
                                //header("location: categories.php");
                                }
                        ?>
                        <!--Adding categories Form-->
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add categories</label>
                                <input class="form-control" name="cat_title" type="text" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" name="SUBMIT" type="submit" value="ADD Categories">
                            </div>
                        </form>
                        
                        
                        <?php
                        if(isset($_GET['edit']))
                        {
                            $update_id=$_GET['edit'];       
                            include './includes/updatecategories.php';
                        }?>
                        
                                                
                        
                    </div>
                    <div class="col-sm-6">
                        <h3>Categories</h3>
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Category Title</th>
                            <th>Option</th>
                            </thead>
                            <tbody>
                        <?php
                        $query="select * from categories";
                        $res = mysqli_query($connection,$query);
                        while ($row= mysqli_fetch_assoc($res)){
                            $id= $row['cat_id'];
                            $title= $row['cat_title'];
                            
                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$title}</td>";
                            echo "<td><a href='categories.php?delete={$id}'>Delete</a> ";
                            echo "/ <a href='categories.php?edit={$id}'>Edit</a></td>";
                            echo "</tr>";
                        }
                        ?>
                         <?php
                         if(isset($_GET['delete'])){
                             $delete_id = $_GET['delete'];
                             $query="delete from categories where cat_id={$delete_id}";
                             mysqli_query($connection, $query);
                             header("location: categories.php");
                             
                         }
                         
                         ?>
                                
                            </tbody>
                        </table>
                        </div>
                        
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