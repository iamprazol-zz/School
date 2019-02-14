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
        <h3>Delete Student</h3>
    </div>
    <div class="form">
        <table align="center"  style="width: 50%; margin-top: 2%">

<form action="deletestudent.php" method="post" >

        <tr>
            <th align="center">Name:</th>
            <td align="left"><input type="text" name="name" placeholder="Enter the name of the student to be deleted" required></td>
        </tr>

        <tr>
            <th align="center">Faculty:</th>
            <td align="left"><input type="text" name="faculty" placeholder="Enter his faculty" required </td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Delete"></td>
        </tr>
    </table>
</form>
</div>
</div>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    include('../dbcon.php');

    $name=$_POST['name'];
    $faculty=$_POST['faculty'];

    $query="SELECT `name`,`faculty` FROM `student` WHERE `name`='".mysqli_real_escape_string($con,$name)."' AND `faculty`='".mysqli_real_escape_string($con,$faculty)."'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);

    if($row== null){
        ?>
        <script>
            alert('No Data Of Student Found');
        </script>

               <?php

    } else {
        $query="DELETE FROM `student` WHERE `name`='".mysqli_real_escape_string($con,$name)."' AND `faculty`='".mysqli_real_escape_string($con,$faculty)."'";
        $run=mysqli_query($con,$query);
        if($run==true){
            ?>
            <script>
                alert('Datas have been deleted!!');
            </script>

            <?php

        }

    }


}

?>