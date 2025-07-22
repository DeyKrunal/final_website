<?php 
session_start();
require_once("connection.php");
$json=array();

$sql = "Select * from sub_schedule_tbl where fid=$_SESSION[ID]";
$res = mysqli_query($con,$sql);


$formattedschedule=[];
foreach($res as $ress){
    $formattedschedule[]=[
        'title'=>$ress['sub_remark'],
        'start'=>$ress['sub_weekly_date'],
        // 'url'=>''
    ];
}
    echo json_encode($formattedschedule);   
    
?>
