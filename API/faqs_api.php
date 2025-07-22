<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

$question = $_REQUEST['question'];

// Perform database query to retrieve answers
$query = "SELECT * FROM faqs WHERE question LIKE '%$question%'";
$result = mysqli_query($conn, $query);

$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}

echo json_encode($response);
?>
