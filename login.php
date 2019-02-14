<?php

session_start();
if(isset($_SESSION['uid'])){
    header("location:admin/index.php");
}

?>


<!DOCTYPE html>
<html lang="en_US">
<head>
    <title>Admin Login</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>


    <body>
    <div class="wrap">
    <div class="head">
        <h1>~Login~</h1>
    </div>
    <div class="form">
        <form action="" method="post">
            <p>Username:</p> <input type="text" name="username" placeholder="Enter your username" required/><br><br>
            <p>Password:</p> <input type="password" name="password" placeholder="Enter your password" required/><br>
            <input type="submit" name="submit" value="Login"/>
        </form>
    </div>
    </div>
    </body>
</html>





<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 1/25/18
 * Time: 8:20 PM
*/

require 'dbcon.php';
global $con;

if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(!empty($username) && !empty($password)) {
        $query="SELECT `username`,`password` FROM `admin` WHERE `username`='".mysqli_real_escape_string($con,$username)."' AND `password`='".mysqli_real_escape_string($con,$password)."'";
        $query_run=mysqli_query($con,$query);
        $rows=mysqli_num_rows($query_run);
        if($rows <1) {
            ?>
            <script>
                alert('Username and Password didn\'t match');
                window.open('login.php','self');
            </script>

            <?php

        } else {
            $data=mysqli_fetch_assoc($query_run);
            $username=$data['username'];

            session_start();
            $_SESSION['uid']=$username;
            header("Location:admin/index.php");
        }
    }
}


?>