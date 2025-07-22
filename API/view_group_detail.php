<?php 

session_start();
include("connection.php");
$grp_name = $_POST['gid'];
if(isset($_GET['grp_name'])){$grp_name = $_GET['grp_name'];}

$sql = "SELECT * FROM `group_stud_tbl` where gsid = '$grp_name'";
$res = mysqli_query($con,$sql);

$arr = array();
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        array_push($arr,$row);
    }
}
// $arr = mysqli_fetch_assoc($res);
// $_SESSION['faculty_id'] = $arr['faculty_id'];
header('Content-Type: application/json');
echo json_encode($arr[0]);

?>