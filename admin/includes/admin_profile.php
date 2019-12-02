
                            <?php
                            $edit_id=$_GET['user_id'];
                                $query="select * from users WHERE user_id=$edit_id";
                                $res = mysqli_query($connection,$query);
                                while ($row= mysqli_fetch_assoc($res)){
                                    $user_id= $row['user_id'];
                                    $username= $row['username'];
                                    $user_password= $row['user_password'];
                                    $user_firstname= $row['user_firstname'];
                                    $user_lastname= $row['user_lastname'];
                                    $user_email= $row['user_email'];
//                                    $user_image= $row['user_image'];
                                    $user_role= $row['user_role'];
                                }
                                ?>

                        <?php
                        if(isset($_POST['edituser'])){
                            $firstname=$_POST['firstname'];
                            $lastname=$_POST['lastname'];
                            $password=$_POST['password'];
//                            $role=$_POST['role'];
//                            $image=$_FILES['image']['name'];
//                            $image_temp=$_FILES['image']['tmp_name'];
                            $email=$_POST['email'];
//                            $date= date("d-m-y");
//                            move_uploaded_file($image_temp,"../images/$image");
                            
                            
                            
                            $query="update users SET user_firstname='$firstname',user_lastname='$lastname'";
                            $query.=",user_password='$password',user_email='$email' where user_id='$edit_id'";
                            $result= mysqli_query($connection, $query);
                            if(!$result){
                                die('QUERY FAILED '.mysqli_error($connection));
                            }
                            else{
                                header("location:users.php?source=profile&user_id=$edit_id");
                            }
                            }
                        ?>

<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="username">Username :</label>
        <input type="text" id="username" class="form-control" name="username" disabled="" value="<?php echo $username;?>">
    </div>
    <div class="form-group">
        <label for="password">Password :</label>
        <input type="password" id="password" class="form-control" name="password" value="<?php echo $user_password;?>">
    </div>
<!--    <div class="form-group">
        <label for="user_role">User Role :</label>
        <select id="" name="role">
            <option value="">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>-->
    <div class="form-group">
        <label for="fname">First name :</label>
        <input type="text" id="fname" class="form-control" name="firstname" value="<?php echo $user_firstname;?>">
    </div>
    <div class="form-group">
        <label for="lname">Last name :</label>
        <input type="text" id="username" class="form-control" name="lastname" value="<?php echo $user_lastname;?>">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" class="form-control" name="email" value="<?php echo $user_email;?>">
    </div>
    <!--    <div class="form-group">
            <label for="image">User image</label>
            <input type="file" class="form-control" id="image" name="image">
    </div>-->
    <input type="submit" class="btn btn-success" name="edituser" value="UPDATE">
</form>
         