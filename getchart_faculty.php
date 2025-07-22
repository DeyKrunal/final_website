<?php 
session_start();
require_once("connection.php");

$sql1="select gsid from group_stud_tbl";
$result=mysqli_query($con,$sql1);
$gs=mysqli_num_rows($result);
$c = $gs * 100;

if($_SESSION['USER'] == "ADMIN"){
    $sql = "SELECT sum(p1) as p1, sum(p2) as p2, sum(p3) as p3, sum(p4) as p4, sum(p5) as p5, sum(p6) as p6, sum(p7) as p7, sum(p8) as p8, sum(p9) as p9 FROM `progress_tbl` ";
}
else{
    $sql = "SELECT sum(p1) as p1, sum(p2) as p2, sum(p3) as p3, sum(p4) as p4, sum(p5) as p5, sum(p6) as p6, sum(p7) as p7, sum(p8) as p8, sum(p9) as p9 FROM `progress_tbl` p join `group_stud_tbl` g on p.grpid=g.gsid where g.faculty_id = $_SESSION[ID]";
}
$res = mysqli_query($con, $sql);
$arr = [];

while ($row = mysqli_fetch_array($res)) {
    for($i =1;$i<=9;$i++){
        $arr1 = array();
        $x = "p".$i;
        $arr1['y'] = $x;
        // $val = $row[$X] * 100 / $c;
        $arr1['a'] = $row[$x]; // Assuming 'p1' corresponds to the 'a' value
        array_push($arr, $arr1);
    }
}

echo json_encode($arr);
?>