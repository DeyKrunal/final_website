<?php 
require("connection.php");
$status = $_POST["status"];

// Update status in the database
$sql = "UPDATE details_status SET status = $status"; // Assuming you are updating for a specific ID
if ($con->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $con->error;
}

?>