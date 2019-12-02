<?php
session_start();
ob_start();
include './DB.php';
$connection = DBconnect();
?>
<?php
if(isset($_GET['login'])){
    if($_GET['login']=="yes"){
        if($_SESSION['username']!=NULL){
        header("location:../admin");
        }
        else {
        header("location:../index.php");
        }
    }
    else {
        header("location:../index.php");
    }
    
                        
}

if(isset($_POST['login'])){
    if($_SESSION['username']==NULL){
    $username= $_POST['username'];
    $password= $_POST['password'];
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $query="select * FROM users where username='$username'";
    $result= mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($connection));
    }
    while ($row= mysqli_fetch_assoc($result)){
        $db_user_id=$row['user_id'];
        $db_username=$row['username'];
        $db_user_firstname=$row['user_firstname'];
        $db_user_lastname=$row['user_lastname'];
        $db_user_role=$row['user_role'];
        $db_user_password=$row['user_password'];
        
    }
    if($username === $db_username && $password === $db_user_password){
        $_SESSION['username']=$db_username;
        $_SESSION['user_firstname']=$db_user_firstname;
        $_SESSION['user_lastname']=$db_user_lastname;
        $_SESSION['user_role']=$db_user_role;
        $_SESSION['user_id']=$db_user_id;
        
        header("location:../admin");
    }
 else {
        header("location:../index.php");
    }    
}
else {
      header("location:../index.php");
      echo '<script>window.alert("lol");</script>';
}
} 
?>
