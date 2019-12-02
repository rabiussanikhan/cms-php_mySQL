<div class="row">
    <div class="col-lg-3 col-md-6">
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
                            echo $post_count=$row['post_count'];
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
    <div class="col-lg-3 col-md-6">
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
                            echo $comment_count=$row['comment_count'];
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
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                            <?php
                            $query="select count(user_id) as user_count FROM users";
                            $result= mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $user_count=$row['user_count'];
                            ?>
                        </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
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
                            echo $category_count=$row['cat_count'];
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
            <div class="row">
                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
            $element_text=['Active post','Categories','Users','Comments'];
            $element_count=[$post_count,$category_count,$user_count,$comment_count];
            for($i=0;$i<4;$i++)
            {
                echo "['$element_text[$i]'".","."{$element_count[$i]}],";
            }
            
            ?>
            
            
//          ['2014', 1000],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script> 
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>





