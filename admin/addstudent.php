<?php

session_start();
if(!isset($_SESSION['uid'])){

    header("Location: ../login.php");
}



?>



<?php

include('header.php');
include('admindash.php');

?>

 <div class="usr">
            <div class="head">
            <h3>Add Student</h3>
        </div>
        <div class="form">
    <table align="center"  style="width: 50%; margin-top: 2%">
    <form action="addstudent.php" method="post" enctype="multipart/form-data">

        <tr>
            <th align="center">Roll no:</th>
            <td align="left"> <input type="text" name="rollno" placeholder="Enter Your Roll no" required></td>
        </tr>

        <tr>
            <th align="center">Name: </th>
            <td align="left"><input type="text" name="name" placeholder="Enter Your Full Name" required></td>
        </tr>

        <tr>
            <th align="center">City: </th>
            <td align="left"><input type="text" name="city" placeholder="Enter Your City" required></td>
        </tr>

        <tr>
            <th align="center">Parent contact:</th>
            <td align="left"> <input type="text" name="pcontact" placeholder="Enter Your Parents Contact Number" required></td>
        </tr>

        <tr>
            <th align="center">Faculty: </th>
            <td align="left"><input type="text" name="faculty" placeholder="Enter Your Faculty" required></td>

        </tr>

        <tr>
            <th align="center">Image: </th>
            <td align="left"><input type="file" name="img" required></td>
        </tr>
        <tr>
            <td  colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
</div>
 </div>
</body>
</html>

<?php



if(isset($_POST['submit'])) {

    include('../dbcon.php');

    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcontact'];
    $faculty = $_POST['faculty'];

    $imagename = $_FILES['img']['name'];
    $tempname=$_FILES['img']['tmp_name'];
    $target="../dataimg/".basename($_FILES['img']['name']);
    move_uploaded_file($tempname,$target);



    $query = "SELECT `rollno`, `faculty` FROM `student` WHERE `rollno`='" . mysqli_real_escape_string($con, $roll) . "' AND `faculty`='" . mysqli_real_escape_string($con, $faculty) . "'";
    $run = mysqli_query($con, $query);
    $row = mysqli_num_rows($run);

    if ($row == null) {

        $query = "INSERT INTO `student` (`id`, `rollno`, `name`, `city`, `pcontact`, `faculty`, `image`) VALUES (NULL, '$roll', '$name', '$city', '$pcon', '$faculty', '$imagename')";

        $run = mysqli_query($con, $query);

        if ($run == false) {
            echo 'Failure';
        } else {
            ?>

            <script>
                alert('Data Have Been Inserted!!');
            </script>

            <?php
        }

    } else {
        echo 'The details of student is already inserted';
    }
}
?>