<!DOCTYPE HTML>
<html lang="en_US">
    <head>
        <meta charset="UTF-8">
        <title>Student Management System</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">

    </head>
    <body>

    <?php
    include('header.php');
    include('admindash.php');
    include('../dbcon.php');
    ?>

    <div class="usr">
        <div class="head">
            <h3>Search Student</h3>
        </div>
        <div class="form">
            <table align="center"  style="width: 50%; margin-top: 2%">

                <form action="index.php" method="post" >

                    <tr>
                        <td align="left">Choose Faculty</td>
                        <td align="center">
                            <select name="faculty">
                                <option value="bct">BCT</option>
                                <option value="bce">BCE</option>
                                <option value="bge">BGE</option>
                                <option value="bme">BME</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">roll no</td>
                        <td align="center">
                            <input type="text" name="rollno" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
                    </tr>
                </form>
            </table>
        </div>
    </div>



        <?php

        if(isset($_POST['submit'])) {

        $faculty = $_POST['faculty'];
        $roll = $_POST['rollno'];
        $query = "SELECT * FROM `student` WHERE `faculty` = '$faculty' AND `rollno` ='$roll'";
        $run = mysqli_query($con, $query);
        $row = mysqli_num_rows($run);
        if ($row > 0) {
        while ($data = mysqli_fetch_assoc($run)) {
        ?>

    <div class="usr">

        <div class="form">
            <table align="center" width="75%" border="2" style="margin-top: 7%;">
                <thead>
                <th colspan="3">Student Information</th>
                </thead>

                <tr>
                    <th colspan="3"><img src="../dataimg/<?php echo $data['image'];?>" style="width: 100px;"/></th></tr>
                </tr>

                <tr>
                    <th>Fullname:</th>
                    <td><?php echo $data['name'];?></td>
                </tr>

                <tr>
                    <th>Roll no:</th>
                    <td><?php echo $data['rollno'];?></td>
                </tr>

                <tr>
                    <th>Faculty</th>
                    <td><?php echo $data['faculty'];?></td>
                </tr>

                <tr>
                    <th>City</th>
                    <td><?php echo $data['city'];?></td>
                </tr>

                <tr>
                    <th>Parent Contact</th>
                    <td><?php echo $data['pcontact'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
   }
   }
   }
   ?>


    </body>
</html>