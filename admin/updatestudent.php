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
        <h3>Student Details</h3>
    </div>
    <div class="form">
<form action="updatestudent.php" method="post">
    <table align="center"  style="width: 50%; margin-top: 2%;">

    <tr>
            <th align="left">Enter Faculty:</th>
            <td align="right"><input type="text" name="faculty" placeholder="Enter student faculty"></td>

            <th align="left">Enter Name:</th>
            <td align="right"><input type="text" name="name" placeholder="Enter student name"></td>


    <td colspan="2"><input type="submit" name="submit" value="Search"></td>
        </tr>
</table>
</form>


<table align="center" width="80%;" border="2" style="margin-top: 10px;">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Rollno</th>
        <th>Edit</th>
    </tr>

<?php

include('../dbcon.php');

if(isset($_POST['submit'])) {

    $faculty=$_POST['faculty'];
    $name=$_POST['name'];

    $query="SELECT * FROM `student` WHERE  `faculty`='".mysqli_real_escape_string($con,$faculty)."' AND `name` LIKE '%$name%'";
    $run=mysqli_query($con,$query);
    $rows=mysqli_num_rows($run);



    if($rows<1) {
        echo "<tr><td colspan='5'>No Records Found.</td></tr>";
    } else {
        $count=0;
        while($data=mysqli_fetch_assoc($run)) {
            $count++;
            $id = $data['id'];
?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width: 100px;"/> </td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['rollno'];?></td>
        <td><a href="updateform.php?sid=<?php echo $id;?>" style="text-decoration: none;">Edit</a></td>
    </tr>

            <?php
        }
    }
}

?>


</table>
    </div>
</div>
