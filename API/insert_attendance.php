<?php 
include_once("connection.php");
$gid = $_POST['gid'];

if(isset($_POST['gid'])){$gid = $_POST['gid'];}
$sql = "INSERT INTO `attandence_tbl`(`gid`) VALUES ($gid)";

if($res = mysqli_query($con,$sql)){
    echo json_encode(array('msg'=>'success'));
}else{
    echo json_encode(array('msg'=>'Error in Inserting'));
}


?>