<?php


session_start();
if(!isset($_SESSION['uid'])){

    header("Location:../login.php");
}



?>



<?php

include('header.php');

?>


<ul class="nav">
    <li class="active"><a href="index.php"  >Home</a></li>
    <li><a href="addstudent.php">Insert Student Details</a> </li>
    <li><a href="updatestudent.php">Update Student Details</a></li>
    <li><a href="deletestudent.php">Delete Student Details</a></a></li>
    <li><a href="logout.php" style="margin-left:30px; ">Logout</a> </li>
</ul>


</body>
</html>
