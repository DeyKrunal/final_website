<?php
include_once("connection.php");
$fid = $_POST['fid'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}
$date = date('y/m/d');
// header("location:check_progress_data.php");

$sql = "select * from `group_stud_tbl` g join `progress_tbl` p on g.gsid=p.grpid where g.faculty_id = '$fid'";
$res = mysqli_query($con,$sql);
$arr = [];
$x = [];
while($data = mysqli_fetch_assoc($res)){
    $arr[] = $data;
    $a = $data['p1'] + $data['p2'] + $data['p3'] + $data['p4'] + $data['p5'] + $data['p6'] + $data['p7'] + $data['p8'] + $data['p9'];
    $amt = ($a * 100)/900;
    $x[] = $amt;
}
$x1 = 0;
foreach($arr as &$data){
    $data['count'] = $x[$x1];
    $x1++;
}
echo json_encode($arr);
?>