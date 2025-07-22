<?php
// Database connection
include_once("connection.php");
$question = $_REQUEST['question'];

// Perform database query to retrieve answers
$query = "SELECT * FROM faqs WHERE question LIKE '%$question%'";
$result = mysqli_query($con, $query);

$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($response,$row);
    }
}
echo json_encode($response);
?>