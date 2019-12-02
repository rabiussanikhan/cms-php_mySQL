
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>In response to</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Disapprove</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <?php
                                $query="select * from comments";
                                $res = mysqli_query($connection,$query);
                                while ($row= mysqli_fetch_assoc($res)){
                                    $comment_id= $row['comment_id'];
                                    $comment_post_id= $row['comment_post_id'];
                                    
                                    $query2="select * from posts where post_id=$comment_post_id";
                                    $get_post_title= mysqli_query($connection, $query2);
                                    $post_title= mysqli_fetch_assoc($get_post_title);
                                    $comment_post_title=$post_title['post_title'];
                                    
                                    
                                    $comment_author= $row['comment_author'];
                                    $comment_email= $row['comment_email'];
                                    $comment_content= $row['comment_content'];
                                    $comment_status= $row['comment_status'];
                                    $comment_date= $row['comment_date'];
                                    

                                    echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_email</td>";
                                    echo "<td><a href='../post.php?post_id=$comment_post_id'>$comment_post_title</a></td>";
                                    echo "<td>$comment_content</td>";
                                    echo "<td>$comment_status</td>";
                                    echo "<td>$comment_date</td>";
                                    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                    echo "<td><a href='comments.php?disapprove=$comment_id'>Disapprove</a></td>";
                                    echo "<td><a href='comments.php?comment_delete=$comment_id'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        
