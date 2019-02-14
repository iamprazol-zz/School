<?php

$conn_error='Couldn\'t connect to the server';
$mysql_host='localhost';
$mysql_user='Prajjwal';
$mysql_password='prajjwal123';
$mysql_db='sms';
$con=@mysqli_connect($mysql_host,$mysql_user,$mysql_password);

if(!$con || @!mysqli_select_db($con,$mysql_db)){
    die($conn_error);
}





?>

