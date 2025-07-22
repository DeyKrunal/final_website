<?php
// Database connection
include("connection.php");

$fid = $_POST['fid'];
$fid = $_GET['fid'];

$titles = array();
$sql = "SELECT * FROM `progress_part_tbl`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $titles[] = $row['pro_name'];
        $row['pro_name']."<br>";
    }
    
}
// Fetch progress values
$sql = "SELECT * FROM `progress_tbl` WHERE `grpid` = $fid";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $progressData = array();
    while ($row = $result->fetch_assoc()) {
        $progress = array();
        for ($i = 1; $i <= 9; $i++) {
            $progress['title'] = $titles[$i-1]; // Assuming pro_name is the title field
            $progress['progress'] = $row['p'.$i];
            $progressData[] = $progress;
        }
    }
    
    if (!empty($progressData)) {
        echo json_encode($progressData);
    } else {
        $x = array();
        echo json_encode(array());
    }
} else{
    $x = array("error"=>"No data found");
    echo json_encode(array($x));
}
$con->close();
?>