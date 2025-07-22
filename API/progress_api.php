<?php
// Include your database connection file
include 'connection.php';

// Check if the group ID is provided
// if(isset($_GET['group_id'])) {
    $groupId = $_GET['group_id'];

    // Query to fetch progress data
    $query = "SELECT p1, p2, p3, p4, p5, p6, p7, p8, p9 FROM progress_tbl WHERE grpid = $groupId";

    // Perform the query
    $result = mysqli_query($con, $query);

    // Check if data is fetched
    if(mysqli_num_rows($result) > 0) {
        // Fetch data as associative array
        $progressData = mysqli_fetch_assoc($result);

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($progressData);
    } else {
        // No group found with the provided ID
        http_response_code(404);
        echo json_encode(array("message" => "Group not found."));
    }
// } else {
//     // Group ID not provided
//     http_response_code(400);
//     echo json_encode(array("message" => "Group ID is required."));
// }
?>
