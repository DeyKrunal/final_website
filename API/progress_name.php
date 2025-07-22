<?php  

include("connection.php");
$fid = $_GET['fid'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}

$sql = "SELECT * FROM `progress_name` where fid = $fid";
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