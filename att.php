<?php 
require_once("connection.php");
$gid=$_REQUEST['gid'];
$sql="insert into attandence_tbl (gid) values($gid)";
$res=mysqli_query($con,$sql);
if($res)
{
    header("Location:attendence.php");
}
?>