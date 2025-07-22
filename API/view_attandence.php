<?php 
include_once("connection.php");
$gid = $_POST['gid'];
if(isset($_GET['gid'])){$gid = $_GET['gid'];}
$sql = "SELECT * FROM `attandence_tbl` WHERE gid = '$gid'";
$result=mysqli_query($con,$sql);
$c=mysqli_num_rows($result);

echo json_encode(array("count"=>"$c"));

?>