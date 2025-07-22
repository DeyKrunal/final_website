<?php
include_once("connection.php");
if(isset($_GET['fid'])){$fid = $_GET['fid'];}
$date = date('y/m/d');

echo $sql1 = "Select gsid from group_stud_tbl where faculty_id = $fid";
echo "<br>";
$res1 = mysqli_query($con,$sql1);
while($row = mysqli_fetch_assoc($res1)){
    echo $sql2 = "Select * from progress_tbl where grpid = $row[gsid]";
    echo "<br>";
    $res2 = mysqli_query($con,$sql2);
    // mysqli_close($con);
    echo $x = mysqli_num_rows($res2)."<br>";
    
    if($x == 0){
        $query = "INSERT INTO `progress_tbl`VALUES ('','$row[gsid]',0,0,0,0,0,0,0,0,0,'$date')";
        $r1 = mysqli_query($con,$query);
        if($r1){
            echo "over<br>";
        }
    }

}

$sql = "select * from `group_stud_tbl` g join `progress_tbl` p on g.gsid=p.grpid where g.faculty_id = $fid";
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