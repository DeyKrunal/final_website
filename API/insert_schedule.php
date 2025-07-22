<?php
include("connection.php");

$fid = $_REQUEST["fid"];
$date = $_REQUEST['date'];
$start_time = $_REQUEST['start_time'];
$remark = $_REQUEST['remark'];
$end_time = $_REQUEST['end_time'];

$arr = array();
if (isset($_GET['fid'])) {
    $fid = $_GET["fid"];
}
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}
if (isset($_GET['start_time'])) {
    $start_time = $_GET['start_time'];
}
if (isset($_GET['remark'])) {
    $remark = $_GET['remark'];
}
if (isset($_GET['end_time'])) {
    $end_time = $_GET['end_time'];
}

$sql = "insert into sub_schedule_tbl (fid,sub_weekly_date,sub_remark,sub_start_date,sub_end_date) values ($fid,'$date','$remark','$start_time','$end_time')";
$result = mysqli_query($con, $sql);
if ($result) {
    echo json_encode(array("result" => "success"));
} else {
    echo json_encode(array("result" => "Something went wrong"));
}
