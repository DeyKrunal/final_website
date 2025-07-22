<?php
require_once("connection.php");
$a=$_GET['del'];
$sql="delete from sub_schedule_tbl where subid=$a";
mysqli_query($con,$sql);
header("location:addschedule.php");
echo "<script>alert('hello')</script>";
?>