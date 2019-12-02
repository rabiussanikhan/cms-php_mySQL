                        <?php
                        if(isset($_POST['adduser'])){
                            $username=$_POST['username'];
                            $firstname=$_POST['firstname'];
                            $lastname=$_POST['lastname'];
                            $password=$_POST['password'];
                            $role=$_POST['role'];
                            
                            
                            

//                            $image=$_FILES['image']['name'];
//                            $image_temp=$_FILES['image']['tmp_name'];

                            $email=$_POST['email'];
//                            $date= date("d-m-y");

//                            move_uploaded_file($image_temp,"../images/$image");
                            $username_query="select username from users";
                            $username_res= mysqli_query($connection, $username_query);
                            $flag=0;
                            while($username_row= mysqli_fetch_assoc($username_res)){
                                $check_uname=$username_row['username'];
                                if($check_uname==$username){
                                    $flag=1;
                                }
                            }
                            if($flag==1){
                                echo '<script>window.alert("Username should not be same")</script>';
                            }else{
                            
                            $query="insert INTO users(username,user_firstname,user_lastname,user_password,user_role,user_email) ";
                            $query.="Values('$username','$firstname','$lastname','$password','$role','$email')";
                            $result= mysqli_query($connection, $query);
                            if(!$result){
                                die('QUERY FAILED '.mysqli_error($connection));
                            }
                            
                            }
                            header("location:users.php?source=");

                        }
                        ?>
<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="username">Username :</label>
        <input type="text" id="username" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password :</label>
        <input type="password" id="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="user_role">User Role :</label>
        <select id="" name="role" class="form-control">
            <option value="">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fname">First name :</label>
        <input type="text" id="fname" class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label for="lname">Last name :</label>
        <input type="text" id="username" class="form-control" name="lastname">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" class="form-control" name="email">
    </div>
    <!--    <div class="form-group">
            <label for="image">User image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>-->
    <input type="submit" class="btn btn-success" name="adduser" value="ADD USER">
</form>
                 