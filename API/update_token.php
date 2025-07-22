<?php

include_once("connection.php");
$token = $_REQUEST['token'];
$gid = $_REQUEST['gid'];
$sql = "UPDATE `group_stud_tbl` SET `token`='$token' WHERE `gsid` = '$gid'";
$res = mysqli_query($con,$sql);
if($res){
    echo json_encode(array("success"=>"1"));
}else{
    echo json_encode(array("success"=>"0"));
}

?>