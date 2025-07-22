<?php
include('connection.php');

$gid = $_REQUEST['gid'];
$sql = "SELECT * FROM `group_stud_tbl` WHERE `gsid` = $gid";
$res = mysqli_query($con,$sql);
$x = mysqli_fetch_assoc($res);
echo json_encode($x);

?>