<?php 

session_start();
 require_once("connection.php");
$gid=$_REQUEST['gid'];
$date=date("Y/m/d");
$_SESSION['gid'] = $gid;
//echo $_SESSION['gid'];
$sql = "Select proid from progress_tbl where grpid = $gid";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res) > 0){
    // // header("location : manage_progress.php");
    // echo $_SESSION['gid']."if";
}
else{
    $sql1 = "INSERT INTO `progress_tbl`(`proid`, `grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ('','$gid','0','0','0','0','0','0','0','0','0','$date')";
    $res = mysqli_query($con,$sql1);
   

}
header("location:manage_progress.php");
?>