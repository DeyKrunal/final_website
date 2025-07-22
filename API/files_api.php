<?php
require_once("connection.php");

    $fid = $_REQUEST['fid'];

    // Fetch uploaded files
    $query = "SELECT * FROM upload_data WHERE fid=$fid";
    $result = $con->query($query);
    $files = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $files[] = $row['file_name'];
        }
    }

    // Provide a JSON response
    header('Content-Type: application/json');
    echo json_encode($files);

?>
