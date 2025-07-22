<?php
// Database connection
include("connection.php");
$date=date("Y/m/d");
$fid = $_POST['fid'];
$fid = $_GET['fid'];

$progressData = array();

// Fetch progress names
$sql = "SELECT * FROM `progress_part_tbl`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $titles = array();
    while ($row = $result->fetch_assoc()) {
        $titles[] = $row['pro_name'];
    }

    // Fetch progress values
    $sql = "SELECT * FROM `progress_tbl` WHERE `grpid` = $fid";
    $result = $con->query($sql);
 if ($result->num_rows == 0) {
     $qr="INSERT INTO `progress_tbl`(`grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ($fid,0,0,0,0,0,0,0,0,0,'$date')";
     mysqli_query($con,$qr);
 }
 
  $sql = "SELECT * FROM `progress_tbl` WHERE `grpid` = $fid";
    $result = $con->query($sql);
 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            for ($i = 1; $i <= 9; $i++) {
                $progress = array();
                $progress['title'] = $titles[$i - 1]; // Assuming pro_name is the title field
                $progress['progress'] = $row['p' . $i];
                $progressData[] = $progress;
            }
        }

        if (!empty($progressData)) {
            echo json_encode($progressData);
        } else {
            $x = array();
            echo json_encode(array());
        }
    } 
} else {
    $x = array("error" => "No progress names found");
    echo json_encode(array($x));
}
$con->close();
?>
