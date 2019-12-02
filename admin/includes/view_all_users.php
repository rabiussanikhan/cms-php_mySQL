
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </thead>
                            <tbody>
                                <?php
                                $query="select * from users";
                                $res = mysqli_query($connection,$query);
                                while ($row= mysqli_fetch_assoc($res)){
                                    $user_id= $row['user_id'];
                                    $username= $row['username'];
                                    $user_firstname= $row['user_firstname'];
                                    $user_lastname= $row['user_lastname'];
                                    $user_email= $row['user_email'];
//                                    $user_image= $row['user_image'];
                                    $user_role= $row['user_role'];
                                    

                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
//                                    echo "<td><img src='../image/$user_image' alt='Image'></td>";
                                    echo "<td>$user_role</td>";
                                    echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                                    echo "<td><a href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?user_delete=$user_id'>Delete</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&user_edit=$user_id'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
