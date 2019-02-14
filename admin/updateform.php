<?php



session_start();
if(!isset($_SESSION['uid'])){

    header("Location:../login.php");
}



?>



<?php

include('header.php');
include('admindash.php');
include ('../dbcon.php');

$sid=$_GET['sid'];
$query="SELECT * FROM `student` WHERE `id`='$sid'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

?>

<div class="usr">
    <div class="head">
        <h3>Add Student</h3>
    </div>
    <div class="form">

            <form action="updatedata.php" method="post">
                <table  align="center" style="width:70%; margin-top: 40px;">

                    <tr>
                        <th align="center">Rollno:</th>
                        <td align="left"><input type="text" name="rollno" value="<?php echo $data['rollno'];?>" required> </td>
                    </tr>

                    <tr>
                        <th align="center">Name:</th>
                        <td align="left"><input type="text" name="name" value="<?php echo $data['name'];?>" required> </td>
                    </tr>

                    <tr>
                        <th align="center">Faculty:</th>
                        <td align="left"><input type="text" name="faculty" value="<?php echo $data['faculty'];?>" required> </td>
                    </tr>


                    <tr>
                        <th align="center">City:</th>
                        <td align="left"><input type="text" name="city" value="<?php echo $data['city'];?>" required> </td>
                    </tr>

                    <tr>
                        <th align="center">Parent contact:</th>
                        <td align="left"><input type="text" name="pcontact" value="<?php echo $data['pcontact'];?>" required> </td>
                    </tr>



                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
                            <input type="submit" name="submit" value="Submit"></td>
                    </tr>


                </table>
            </form>
    </div>
</div>
</body>
</html>



