<?php
include_once("connection.php");
if(isset($_GET['fid'])){$fid = $_GET['fid'];}
$date = date('y/m/d');
$arr = [];

// header("location:group_progress_detail.php");
echo $sql1 = "Select gsid from group_stud_tbl where faculty_id = $fid";
echo "<br>";
$res1 = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_assoc($res1)) {
    echo $sql2 = "Select * from progress_tbl where grpid = $row[gsid]";
    echo "<br>";
    $res2 = mysqli_query($con, $sql2);
    // mysqli_close($con);
    $x = mysqli_num_rows($res2);

    if ($x==0) {
        echo $qu = "INSERT INTO `progress_tbl`( `grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ($row[gsid],0,0,0,0,0,0,0,0,0,'$date')";
        echo "<br>";
        $re = mysqli_query($con,$qu);
        // array_push($arr,$qu);
    }
}
// $x = count($arr);
// $i = 0;
// while($i != $x){
//     // echo "<br>".$arr[$i];
//     mysqli_query($con,$arr[$i]);
//     $i++;
// }
header("location:group_progress_detail.php");
?>