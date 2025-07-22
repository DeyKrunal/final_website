<?php
include_once("connection.php");
$fid = $_POST['fid'];

if(isset($_GET['fid'])){$fid = $_GET['fid'];
}

// $sql = "SELECT count(name1) as n1,count(name2) as n2,count(name3) as n3,count(name4) as n4 FROM `group_stud_tbl` WHERE faculty_id = $fid";
// $res = mysqli_query($con,$sql);
$sql1="Select count(name1) as n1 from `group_stud_tbl`where faculty_id = $fid and name1 != ''";
$res1 = mysqli_query($con,$sql1);

$sql2="Select count(name2) as n2 from `group_stud_tbl`where faculty_id = $fid and name2 != ''";
$res2 = mysqli_query($con,$sql2);

$sql3="Select count(name4) as n3 from `group_stud_tbl`where faculty_id = $fid and name3 != ''";
$res3 = mysqli_query($con,$sql3);

$sql4="Select count(name4) as n4 from `group_stud_tbl`where faculty_id = $fid and name4 != ''";
$res4 = mysqli_query($con,$sql4);

while($row1 = mysqli_fetch_array($res1)){
    $x1 = $row1[0];
}

while($row2 = mysqli_fetch_array($res2)){
    $x2 = $row2[0];
}

while($row3 = mysqli_fetch_array($res3)){
    $x3 = $row3[0];
}
while($row4 = mysqli_fetch_array($res4)){
    $x4 = $row4[0];
}

$x = $x1 + $x2 + $x3 + $x4;
$arr = ["gcount"=>"$x"];
echo json_encode($arr);

?>