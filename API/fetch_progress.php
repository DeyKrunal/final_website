<?php
// Include the database connection script
include('connection.php');
$date=date("Y/m/d");
// Check if grpid is sent from Flutter
if (isset($_GET['grpid'])) {
    // Fetch grpid from the request
    $grpid = $_GET['grpid'];

    // Prepare the SQL statement
    $sql = "SELECT p1, p2, p3, p4, p5, p6, p7, p8, p9 FROM progress_tbl WHERE grpid = ?";
    
    // Prepare and execute the query
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $grpid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Check if a row is found
    if ($row) {
        // Calculate the total progress
        $totalProgress = array_sum($row);

        // Return the total progress as JSON response
        echo json_encode(['totalProgress' => $totalProgress]);
    } else {
          $qr="INSERT INTO `progress_tbl`(`grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ( $grpid,0,0,0,0,0,0,0,0,0,'$date')";
            mysqli_query($con,$qr);
             $sql = "SELECT p1, p2, p3, p4, p5, p6, p7, p8, p9 FROM progress_tbl WHERE grpid = ?";
    
    // Prepare and execute the query
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $grpid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Check if a row is found
    if ($row) {
        // Calculate the total progress
        $totalProgress = array_sum($row);

        // Return the total progress as JSON response
        echo json_encode(['totalProgress' => $totalProgress]);
    }
     
    }
} else {
    // If grpid is not sent from Flutter, return error
    echo json_encode(['error' => 'Group ID not provided']);
}
?>
