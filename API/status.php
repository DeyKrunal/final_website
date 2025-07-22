<?php 
include("connection.php");

$sql = "SELECT * FROM `details_status`";
$res = mysqli_query($con,$sql);
$x = mysqli_fetch_assoc($res);
echo json_encode($x);
?>