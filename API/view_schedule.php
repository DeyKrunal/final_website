<?php 
session_start();
require_once("connection.php");
 $date = date("Y-m-d");
// $json=array();
$fid = $_POST['fid'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}
$sql = "Select * from sub_schedule_tbl where fid='$fid' and sub_weekly_date >= '$date' order by sub_weekly_date limit 7";
$res = mysqli_query($con,$sql);


$formattedschedule=[];
foreach($res as $ress){
    $formattedschedule[]=[
        'id'=>$ress['subid'],
        'title'=>$ress['sub_remark'],
        'date'=>$ress['sub_weekly_date'],
        'start'=>$ress['sub_start_date'],
        'end'=>$ress['sub_end_date']
        // 'url'=>''
    ];
}
echo json_encode($formattedschedule);   
    
?>
