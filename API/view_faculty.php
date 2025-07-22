<?php 
session_start();
include_once("connection.php");
$fid = $_POST['fid'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}

$sql1 = "select * from faculty_tbl where fid = $fid";
$res1 = mysqli_query($con,$sql1);
$arr1 = mysqli_fetch_assoc($res1);
print(json_encode($arr1));

?>