<?php

include_once("connection.php");
$fid = $_POST['fid'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}


$sql = "Select * from group_stud_tbl where faculty_id = '$fid'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
$arr = ["count"=>"$count"];
echo json_encode($arr);
?>