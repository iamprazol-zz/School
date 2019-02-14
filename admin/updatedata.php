<?php

include ('header.php');
include('admindash.php');

include('../dbcon.php');

if(isset($_POST['submit'])) {

    include('../dbcon.php');

    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcontact'];
    $faculty = $_POST['faculty'];
    $id=$_POST['sid'];

    $imagename = $_FILES['img']['name'];
    $tempname = $_FILES['img']['temp_name'];
    $target = "../dataimg" . basename($_FILES['img']['name']);

    move_uploaded_file($tempname, $target);

    $query = "UPDATE `student` SET  `rollno` = '$roll',`name`='$name', `city` = 'chitwan',`pcontact`='$pcon',`faculty`='$faculty' WHERE `student`.`id` = '$id';";
    $run = mysqli_query($con, $query);
    if($run==true){
        ?>

        <script>
            alert ('Updated');
            window.open('updateform.php?sid=<?php echo $id;?>','_self');
        </script>

        <?php
    } else {
        ?>

        <script>
            alert ('Failed');
        </script>

        <?php
    }
}


?>
