<?php 
require_once("connection.php");
$date = date('Y/m/d');
echo $date;
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];
$p8 = $_POST['p8'];
$p9 = $_POST['p9'];
$gid = $_POST['gid'];

$sql = "UPDATE `progress_tbl` SET `p1`='$p1',`p2`='$p2',
`p3`='$p3',`p4`='$p4',`p5`='$p5',`p6`='$p6',
`p7`='$p7',`p8`='$p8',`p9`='$p9',`date`='$date' WHERE `grpid`='$gid'";
$res = mysqli_query($con,$sql);

if($res){
    echo json_encode(array("msg"=>"success"));
}else{
    echo json_encode(array("msg"=>"fail"));
}

?>