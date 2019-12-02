<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                            <?php
                            $query="select count(post_id) as post_count FROM posts";
                            $result= mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['post_count'];
                            ?>
                        </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php?source=">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                     <?php
                            $query="select count(comment_id) as comment_count FROM comments";
                            $result= mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['comment_count'];
                            ?>
                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php?source=">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                            <?php
                            $query="select count(cat_id) as cat_count FROM categories";
                            $result= mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['cat_count'];
                            ?>
                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>