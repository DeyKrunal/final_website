<?php
include("connection.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Endpoint to fetch notifications for a specific student
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $studentId = 101; // Assuming the student ID is passed as a query parameter
    $notifications = fetchNotificationsForStudent($studentId);
    echo json_encode($notifications);
}

// Function to fetch notifications for a specific student
function fetchNotificationsForStudent($studentId) {
    global $con;

    $notifications = array();

    // Retrieve notifications for the student from the database
    $sql = "SELECT * FROM notifications WHERE student_id = '$studentId'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch each notification and add it to the array
        while($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }
    }

    return $notifications;
}

$conn->close();
?>
