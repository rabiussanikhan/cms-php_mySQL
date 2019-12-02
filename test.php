<?php include './include/DB.php';
$connection = DBconnect();
?>
    <!--header-->
<?php include './include/header.php';?>
    <!-- Navigation -->
<?php include  './include/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <?php
               
               class student{
                   
                   public $name='sani';
                   
                   var $id;
                   var $email;
                   
                   function display(){
                       
                   }
               }
               $aStudent = new student();
               ?>
                <h1 class="text-center"><?php $aStudent->display();echo $aStudent->name
                ?></h1>

            </div>
            
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include './include/sidebar.php';?>

        </div>
        <!-- /.row -->

<?php include './include/footer.php';?>
  