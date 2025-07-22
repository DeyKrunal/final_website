<?php 
session_start();
require_once("connection.php");
// $json=array();

$date=date("Y/m/d");
$fid = $_POST['fid'];
$dt = $_POST['sub_weekly_date'];
if(isset($_GET['fid'])){$fid = $_GET['fid'];}

if($dt == ""){
    $sql = "Select * from sub_schedule_tbl where fid='$fid' AND sub_weekly_date='$date'";
}else{
   $sql = "Select * from sub_schedule_tbl where fid='$fid' AND sub_weekly_date='$dt'";
}

$res = mysqli_query($con,$sql);

if ($res->num_rows > 0) {
    $formattedschedule=[];
    foreach($res as $ress){
        $formattedschedule[]=[
            'title'=>$ress['sub_remark'],
            'date'=>$ress['sub_weekly_date'],
            'start'=>$ress['sub_start_date'],
            'end'=>$ress['sub_end_date']
            // 'url'=>''
        ];
    }
    
    if (!empty($formattedschedule)) {
        echo json_encode($formattedschedule[0]);
    } else {
        $x = array('title' => 'No progress data available','date' => 'No Date Found','start' => 'No Time','end' => 'No Time');
        echo json_encode($x);
    }
} else {
    $x = array('title' => 'No Data Found','date' => 'No Data Found','start' => 'No Data Found','end' => 'No Data Found');
    echo json_encode($x);
}

    
?>
