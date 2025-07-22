<?php 
include("connection.php");

$gid = $_REQUEST['gid'];
$sql = "UPDATE `group_stud_tbl` SET `token` = NULL WHERE `gsid` = $gid";
$res = mysqli_query($con,$sql);

if($res){
    echo json_encode(array("success"=>"1"));
}
else{
    echo json_encode(array("success"=>"0"));
}

?>