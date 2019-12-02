<div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" autocomplete="off" required="">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                
                
                <!--Login Form-->
                
                <div class="well">
                    <h4>Login</h4>
                    <form action="include/login.php" method="POST">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" autocomplete="off" required="" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" autocomplete="off" required="" placeholder="Password">
                    </div>    
                        
                        
                        <div class="form-horizontal">
                        <button name="login" class="btn btn-primary" type="submit">Login</button>
                            <a href="registration.php" class="btn btn-primary">Sign Up</a>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                    $query = "select * from categories";
                    $res = mysqli_query($connection, $query);
                    $row = mysqli_fetch_all($res);
                    foreach ($row as $list){
                        $cat_id=$list[0];
                        echo "<li><a href='category_post.php?cat_id=$cat_id'>$list[1]</a></li>";
                    }
                    
                    ?>
                               
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       
                    </div>
                    <!-- /.row -->
                </div>

                <?php include 'widget.php';?>

            </div>