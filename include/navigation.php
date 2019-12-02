<?php session_start();?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $query = "select * from categories";
                    $res = mysqli_query($connection, $query);
                    $row = mysqli_fetch_all($res);
                    foreach ($row as $list){
                        $cat_id=$list[0];
                        echo "<li><a href='category_post.php?cat_id=$cat_id'>$list[1]</a></li>";
                    }
                    
                    ?>
                    <?php
                    
                    if($_SESSION){
                        if($_SESSION['user_role'])
                    {
                        if(isset($_GET['post_id']))
                        {
                            $edit_post_id=$_GET['post_id'];
                            echo "<li><a href='admin/post.php?source=edit_post&edit=$edit_post_id'>Edit Post</a></li>";
                        }
                        
                    }
                    }
                    ?>
                    
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <li>
                        <a href="include/login.php?login=yes">Admin</a>
                    </li>
                    </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>