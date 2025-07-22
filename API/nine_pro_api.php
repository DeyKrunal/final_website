<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch progress titles from the database
function getProgressTitles($conn) {
    $sql_titles = "SELECT pro_name FROM progress_part_tbl";
    $result_titles = $conn->query($sql_titles);

    $progress_titles = array();
    if ($result_titles->num_rows > 0) {
        while($row = $result_titles->fetch_assoc()) {
            array_push($progress_titles,$row['pro_name']);
        }
    }
    return $progress_titles;
}

// Fetch progress values for a specific group ID from the database
function getProgressValues($conn, $group_id) {
    $sql_progress = "SELECT  p1, p2, p3, p4, p5, p6, p7, p8, p9 FROM progress_tbl WHERE grpid = $group_id";
    $result_progress = $conn->query($sql_progress);

    $progress_values = array();
    if ($result_progress->num_rows > 0) {
        $i = 1;
        while($row = $result_progress->fetch_assoc()) {
            $x = 'p'.$i;
            array_push($progress_values,$row['p1']);
            array_push($progress_values,$row['p2']);
            array_push($progress_values,$row['p3']);
            array_push($progress_values,$row['p4']);
            array_push($progress_values,$row['p5']);
            array_push($progress_values,$row['p6']);
            array_push($progress_values,$row['p7']);
            array_push($progress_values,$row['p8']);
            array_push($progress_values,$row['p9']);
            $i++;
        }
    }
    return $progress_values;
}

// Check if group ID is provided in the request
if(isset($_GET['group_id'])) {
    $group_id = $_GET['group_id'];
    $progress_titles = getProgressTitles($conn);
    $progress_values = getProgressValues($conn, $group_id);

    // Combine progress titles and values
    $response = array(
        'titles' => $progress_titles,
        'values' => $progress_values
    );

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo "Group ID not provided";
}

$conn->close();
?>
