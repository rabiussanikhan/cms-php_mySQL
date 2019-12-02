<?php  include "include/DB.php"; 
$connection= DBconnect();
?>
 <?php  include "include/header.php"; ?>
    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    <?php
    if(isset($_POST['registration_submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $flag=0;
                            $username_query="select username from users";
                            $username_res= mysqli_query($connection, $username_query);
                            while($username_row= mysqli_fetch_assoc($username_res)){
                                $check_uname=$username_row['username'];
                                if($check_uname==$username){
                                    $flag=1;
                                }
                            }
                            if($flag==1){
                                echo '<script>window.alert("username already exists! Try another username")</script>';
                            }else{                            
                            $query="insert INTO users(username,user_password,user_role,user_email,user_firstname,user_lastname,user_image) ";
                            $query.="Values('$username','$password','Subscriber','$email','','','')";
                            $result= mysqli_query($connection, $query);
                            if(!$result){
                                die('QUERY FAILED '.mysqli_error($connection));
                            }
                            header("location:index.php");
                            }
    }
    ?>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="registration_submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
